<template>
  <div class="card">
    <div class="card-header">Payment Methods</div>
    <div class="card-body">
      <div>
        Available payment method
        <a v-for="(paymentMethod, index) of paymentMethods" :key="index">
          {{ paymentMethod }}
        </a>
      </div>
      <br />

      <div>
        Select pricing plan
        <a
          v-for="([plan, info], index) of Object.entries(pricingPlans)"
          :key="index"
        >
          {{ JSON.stringify(plan) }} - Price: {{ info.price }} - Quota:
          {{ info.quota }}
        </a>
      </div>
      <br />

      <div>
        Save Card (Yes or No)
      </div>

      <input
        type="text"
        class="form-control"
        v-model="cardHolder.name"
        placeholder="Card holder's name"
      />
      <br />

      <div ref="card"></div>
      <div ref="errors" role="alert"></div>
      <br />

      <button ref="button" class="form-control btn-success" @click="checkout">
        Save Payment method
      </button>
    </div>
  </div>
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
      selectedPlan: "MINI",
      pricingPlans: [],
      cardHolder: { name: "" }
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
        alert(error.message);
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
        alert(error.message);
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
      } catch (err) {
        alert("Failed to get pricing plans");
      }
    }
  }
};
</script>

<style>
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
