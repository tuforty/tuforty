<template>
  <section class="billing-payment">
    <h2 class="title">Payment</h2>
    <option-list
      title="Payment Method"
      description="Select how you would like to pay"
      :options="paymentOptions"
      v-model="selectedPaymentMethod"
    />
    <option-list
      title="Plan"
      description="Select the plan you would like to pay for"
      :options="paymentPlans"
      v-model="selectedPaymentPlan"
    />
    <h2 class="title">Card details</h2>
    <input type="text" class="input" v-model="cardHolder.name" placeholder="Card holder's name" />
    <div ref="card"></div>
    <div ref="errors" role="alert"></div>
    <img class="stripe-logo" :src="'/img/powered_by_stripe.svg'" alt="powered by strip" />
    <button ref="button" class="button button--dark fullWidth" @click="checkout">Save payment method</button>
  </section>
</template>

<script>
let stripe = Stripe(process.env.MIX_STRIPE_KEY),
  elements = stripe.elements(),
  card = undefined;

export default {
  props: ["intentSecret", "paymentMethods"],
  data() {
    return {
      saveCard: true,
      selectedPaymentMethod: "old-card",
      selectedPaymentPlan: "starter",
      selectedPlan: "MINI",
      pricingPlans: [],
      cardHolder: { name: "" },
      paymentOptions: [
        {
          label: "Old card",
          value: "old-card"
        },
        {
          label: "New card",
          value: "new-card"
        }
      ],
      paymentPlans: [
        {
          label: "Starter",
          description: "2,500 translations for $20",
          value: "starter"
        },
        {
          label: "Start up",
          description: "2,500 translations for $20",
          value: "large-teams"
        }
      ]
    };
  },

  mounted() {
    card = elements.create("card");
    card.mount(this.$refs.card);
    this.getAvailablePricingPlans();
  },

  methods: {
    /**
     * Checkout the payment info selected.
     */
    async checkout() {
      try {
        const paymentMethod = this.saveCard
          ? await this.setupSavableCard()
          : await this.setupUnsavableCard();
        await this.makePurchase(paymentMethod);
      } catch (err) {}
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
      if (error) {
        throw Error(error);
      }
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
      if (error) {
        throw Error(error);
      }
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
      try {
        const { data } = await axios.post("/api/billing/purchase", {
          save_card: this.saveCard,
          stripe_payment_intent: paymentMethod,
          product_id: this.selectedPlan
        });
        alert(data.message);
      } catch (err) {
        alert("An error occured why charging the card.");
      }
    },

    /**
     * Get list of supported pricing plans.
     */
    async getAvailablePricingPlans() {
      try {
        const { data } = await axios.get("/api/pricing");
        this.pricingPlans = data.data;
      } catch (err) {}
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
