<template>
  <div class="billing-status">
    <span class="balance">{{ currentPlan.quota_left | formatNumber }}</span>
    <span class="muted text-center">BALANCE</span>
    <div class="grid">
      <section>
        <manage-api-tokens></manage-api-tokens>
      </section>
      <section v-if="currentPlan.last_transaction">
        <h2 class="title">Current Plan</h2>
        <div class="card card--plain plan-card">
          <h4>
            {{ currentPlan.last_transaction.plan_name | stripUnderscore }}
          </h4>
          <span
            >{{
              currentPlan.last_transaction.quota_purchased || 0 | formatNumber
            }}
            transalation(s)</span
          >
          <span class="price"
            >$
            {{
              ((currentPlan.last_transaction.plan_amount || 0) / 100)
                | formatNumber
            }}</span
          >
          <span v-if="currentPlan.quota_left > 0" class="status active"
            >Active</span
          >
          <span v-else class="status active">Active</span>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import { stripUnderscore } from "../../utils/string";
import { EventBus } from "../../utils/event.js";

export default {
  created() {
    this.getCurrentPlan();
  },

  mounted() {
    EventBus.$on("purchase-made", function() {
      this.getCurrentPlan();
    });
  },

  data: () => ({
    loading: false,
    currentPlan: {
      last_transaction: {}
    }
  }),

  filters: {
    stripUnderscore,

    formatNumber(number) {
      const formatter = Intl.NumberFormat("en-US");
      return formatter.format(number);
    }
  },

  methods: {
    /**
     * Get the current plan of the user.
     */
    async getCurrentPlan() {
      this.loading = true;
      try {
        const { data } = await axios.get("/api/v1/billing/current-plan");
        this.currentPlan = data.data;
      } catch (error) {
        this.error = error.message;
      } finally {
        this.loading = false;
      }
    }
  }
};
</script>

<style scoped>
.billing-status {
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
}

.billing-status > * {
  margin: 30px 0;
}

.billing-status > span {
  margin: 5px 0;
}

.balance {
  color: var(--blue);
  font-size: 60px;
  font-weight: 500;
  letter-spacing: 1.5px;
  margin: 0 auto !important;
}

.plan-card {
  display: flex;
  flex-direction: column;
}

.plan-card > * {
  margin: 10px 0;
}

.price {
  font-size: 20px;
  color: var(--blue);
}

.status {
  text-align: right;
  width: 100%;
}

.status.active {
  color: #64d359;
}

.status.inactive {
  color: #b22222;
}
</style>
