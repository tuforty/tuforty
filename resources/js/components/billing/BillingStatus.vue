<template>
  <div class="billing-status">
    <span class="balance">{{ 35000000 | formatNumber }}</span>
    <span class="muted text-center">BALANCE</span>
    <div class="grid">
      <section>
        <manage-api-tokens></manage-api-tokens>
        <slide-input :value="threshold" label="Notification Threshold" name="threshold"></slide-input>
      </section>
      <section>
        <h2 class="title">Current Plan</h2>
        <div class="card card--plain plan-card">
          <h4>Starter plan</h4>
          <span>{{ 200000 | formatNumber }} transalations</span>
          <span class="price">$ {{ 20 | formatNumber }}</span>
          <span class="status active">Active</span>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    threshold: 20
  }),
  filters: {
    formatNumber(number) {
      const formatter = Intl.NumberFormat("en-US");
      return formatter.format(number);
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
