<template>
  <div class="activity">
    <div class="card card--plain">
      <h2 class="title">Quota</h2>
      <div class="activity__quota">
        <div class="activity__quota__icon">
          <ion-icon name="hourglass" size="large"></ion-icon>
          <br />
          <label for="quota-left">Remaining</label>
        </div>
        <div class="activity__quota__icon">
          <ion-icon name="wallet" size="large"></ion-icon>
          <br />
          <label for="quota-last-purchased">Last Purchased</label>
        </div>
        <span class="activity__quota__number" id="quota-left">{{ user.quota_left | formatNumber }}</span>
        <span
          class="activity__quota__number"
          for="quota-last-purchased"
        >{{ user.quota_last_purchased | formatNumber }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["user"],

  mounted() {
    this.getUsage();
  },

  data: () => ({
    usage: null,
    type: "TRANSLATE_MONEY_TO_WORDS",
    filterType: "LAST_7_DAYS"
  }),

  methods: {
    async getUsage() {
      try {
        const params = { type: this.type, filter_type: this.filterType };
        const { data } = await axios.get("/api/usage/analytics", { params });
        this.usage = data.data;
      } catch (err) {}
    }
  },

  filters: {
    formatNumber(number) {
      const formatter = Intl.NumberFormat("en-US");
      return formatter.format(number);
    }
  }
};
</script>

<style>
.activity {
  margin-top: 20px;
}

.activity .card {
  height: 300px;
  overflow: scroll;
}

.activity > * {
  margin: 20px 0;
}

.activity__quota {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-template-rows: repeat(2, 1fr);
  grid-gap: 30px;
  align-items: center;
  justify-items: center;
  height: 70%;
}

.activity__quota__icon {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.activity__quota ion-icon {
  color: var(--blue);
  justify-items: center;
}

.activity__quota .activity__quota__number {
  font-size: 2rem;
  color: var(--blue);
}
</style>
