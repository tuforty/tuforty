<template>
  <section class="billing-payment">
    <h2 class="title">Payment</h2>
    <div class="grid">
      <section v-if="hasOldCard">
        <option-list
          title="Payment Method"
          description="Select how you would like to pay"
          :options="paymentOptions"
          v-model="selectedPaymentMethod"
        />
      </section>
      <section>
        <option-list
          title="Plan"
          description="Select the plan you would like to pay for"
          :options="pricingPlans"
          v-model="selectedPlan"
        />
      </section>
    </div>
    <h2 class="title">Card details</h2>
    <div>
      <section id="stripe-form" class="flex-v-center spaced">
        <input
          type="text"
          class="input fullWidth"
          v-model="cardHolder.name"
          placeholder="Card holder's name"
        />
        <div ref="card"></div>
        <div ref="errors" role="alert"></div>
        <img class="stripe-logo" :src="'/img/powered_by_stripe.svg'" alt="powered by strip" />
        <button
          ref="button"
          class="button button--dark fullWidth"
          @click="checkout"
          :disabled="!formCompleted || loading"
        >{{ loading ? "Purchasing" : "Purchase Quota"}}</button>
      </section>
    </div>
  </section>
</template>

<script>
import { ucFirst } from "../../utils/string";
import { EventBus } from "../../utils/event";

let stripe, elements, card;
if (window.Stripe != null) {
  stripe = Stripe(process.env.MIX_STRIPE_KEY);
  elements = stripe.elements();
  card = undefined;
}

export default {
  mounted() {
    card = elements.create("card");
    card.mount(this.$refs.card);
    this.getAvailablePricingPlans();
  },

  props: ["intentSecret", "paymentMethods"],

  data() {
    return {
      saveCard: false,
      selectedPaymentMethod: "old-card",
      cardHolder: { name: "" },
      hasOldCard: false,
      loading: false,
      paymentOptions: this.getPaymentOptions(),
      selectedPlan: "",
      pricingPlans: []
    };
  },

  computed: {
    formCompleted: function() {
      return this.cardHolder.name.trim().length > 0;
    }
  },

  methods: {
    /**
     * Clear the payment card form.
     */
    clearPaymentForm() {
      this.cardHolder.name = "";
      card.clear();
    },

    /**
     * Validate that the payment form is completed.
     */ validatePaymentForm() {
      if (this.cardHolder.name.trim().length <= 0) {
        throw Error("Card holder's name cannot be empty.");
      }
    },

    /**
     * Check if the current user has an existing card saved.
     */
    getPaymentOptions() {
      const options = [{ label: "New card", value: "new-card" }];

      this.hasOldCard =
        this.paymentMethods.length > 0 &&
        Object.keys(this.paymentMethods[0]) > 0;

      if (this.hasOldCard) {
        options.push({ label: "New Card", value: "new-card" });
      }

      return options;
    },

    /**
     * Checkout the payment info selected.
     */
    async checkout() {
      this.loading = true;

      try {
        this.validatePaymentForm();
        const paymentMethod = await this.setupUnsavableCard();
        await this.makePurchase(paymentMethod);
        this.clearPaymentForm();
      } catch (err) {
        console.error(err);
        this.$toast.error(err.message || "Error occured while making payment.");
      } finally {
        this.loading = false;
      }
    },

    /**
     * Setup a card that can be saved to customer profile.
     */
    async setupSavableCard() {
      const { setupIntent, error } = await stripe.handleCardSetup(
        this.intentSecret,
        card,
        {
          payment_method_data: {
            billing_details: { name: this.cardHolder.name }
          }
        }
      );

      if (error) throw Error(error.message);
      return setupIntent.payment_method;
    },

    /**
     * Setup a card that cannot be saved to customer profile.
     */
    async setupUnsavableCard() {
      const { paymentMethod, error } = await stripe.createPaymentMethod(
        "card",
        card,
        { billing_details: { name: this.cardHolder.name } }
      );

      if (error) throw Error(error.message);
      return paymentMethod.id;
    },

    /**
     * Handle payment errors.
     */
    async handleError(error) {
      this.$refs.errors = error;
    },

    /**
     * Make purchase request with the backend.
     */
    async makePurchase(paymentMethod) {
      const { data } = await axios.post("/api/v1/billing/purchase", {
        save_card: this.saveCard,
        stripe_payment_intent: paymentMethod,
        product_id: this.selectedPlan
      });

      this.$toast.success("Purchase successfull.");
      EventBus.$emit("purchase::success");
      return data;
    },

    /**
     * Get list of supported pricing plans.
     */
    async getAvailablePricingPlans() {
      try {
        const { data } = await axios.get("/api/v1/pricing");
        const planNames = Object.keys(data.data);

        this.selectedPlan = planNames[0];

        this.pricingPlans = planNames.map(planName => {
          const { price, quota, label } = data.data[planName];
          return {
            label,
            value: planName,
            description: `${quota} translations for $${quota / 100}`
          };
        });
      } catch (err) {
        console.error(err);
        this.$toast.error(
          err.response.message || "Error occured while fetching pricing plans."
        );
      }
    }
  }
};
</script>

<style scoped>
.billing-payment {
  display: flex;
  flex-direction: column;
}

.billing-payment > * {
  margin: 15px 0;
}

.title {
  color: #333333;
  font-size: 22px;
  font-weight: 500;
}

.StripeElement {
  font-family: "SQ Market";
  box-sizing: border-box;
  height: 70px;
  padding: 25px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
  margin: 0;
  width: 100%;
}

.StripeElement--focus {
  border: 1px solid var(--blue);
}

.StripeElement--invalid {
  border-color: #b22222;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

.stripe-logo {
  width: 100px;
  margin: 0 auto !important;
}
</style>
