<template>
  <div class="activity">
    <div class="card card--plain">
      <h2 class="title">Quota</h2>
      <div class="quota__item">
        <h3>
          <ion-icon name="timer" size="large"></ion-icon>Used
        </h3>
        <span>{{ 200000 | formatNumber }}</span>
      </div>
      <div class="quota__item">
        <h3>
          <ion-icon name="hourglass" size="large"></ion-icon>Remaining
        </h3>
        <span>{{ 200000 | formatNumber }}</span>
      </div>
    </div>
    <div class="card card--plain">
      <h2 class="title">Translations</h2>
      <data-table
        :headers="tableData.headers"
        :alignments="tableData.alignments"
        :data="tableData.data"
      />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      usage: null,
      type: "TRANSLATE_MONEY_TO_WORDS",
      filterType: "LAST_7_DAYS",
      tableData: {
        headers: ["Code", "Language", "Total Translations"],
        alignments: ["left", "left", "right"],
        data: [
          ["FR", "French", "20000"],
          ["ESP", "Spanish", "20000"]
        ]
      }
    };
  },

  filters: {
    formatNumber(number) {
      const formatter = Intl.NumberFormat("en-US");
      return formatter.format(number);
    }
  },

  mounted() {
    this.getUsage();
  },

  methods: {
    async getUsage() {
      try {
        const params = { type: this.type, filter_type: this.filterType };
        const { data } = await axios.get("/api/usage/analytics", { params });
        this.usage = data.data;
      } catch (err) {}
    }
  }
};
</script>

<style>
.activity {
  display: grid;
  grid-column-gap: 30px;
  grid-template-columns: repeat(2, 1fr);
  margin-top: 20px;
}

@media only screen and (max-width: 1080px) {
  .activity {
    grid-template-columns: 1fr;
    grid-auto-flow: row;
  }
}

.activity .card {
  height: 300px;
  overflow: scroll;
}

.activity > * {
  margin: 20px 0;
}

.quota__item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-weight: 500;
  margin: 30px 0;
}

.quota__item h3 {
  display: flex;
  align-items: center;
}
.quota__item h3 * {
  margin: 5px;
}
.quota__item h3 ion-icon {
  color: var(--blue);
}

.quota__item span {
  font-size: 20px;
  color: var(--blue);
}
</style>
