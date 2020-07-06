<template>
  <div id="chart-usage" class="card card--plain">
    <h3 class="title">Usage activity</h3>
    <span class="text-success usage__percentage">
      <!-- <ion-icon name="arrow-up"></ion-icon>22.9% -->
    </span>
    <apexchart
      type="line"
      :options="chartOptions"
      :series="series"
      height="300"
    ></apexchart>
    <peroid-switcher
      name="peroid"
      @change="getUsageHistory"
      v-model="selectedTimeFrame"
      :options="timeFrames"
    ></peroid-switcher>
  </div>
</template>

<script>
import moment from "moment";
import { stripUnderscore, ucFirst } from "../../utils/string";

export default {
  mounted() {
    this.getUsageHistory();
  },

  props: ["user"],

  data: () => ({
    series: [],
    selectedTimeFrame: "LAST_24_HOURS",
    timeFrames: [
      {
        label: "1D",
        value: "LAST_24_HOURS",
        noOfDays: 1
      },
      {
        label: "1W",
        value: "LAST_7_DAYS",
        noOfDays: 7
      },
      {
        label: "1M",
        value: "LAST_30_DAYS",
        noOfDays: 30
      },
      {
        label: "1Y",
        value: "LAST_1_YEAR",
        noOfDays: 365
      }
    ],

    chartOptions: {
      chart: {
        id: "usage",
        toolbar: {
          show: false
        }
      },
      xaxis: {
        type: "category",
        categories: [],
        labels: {
          show: true
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          // show: false
        }
      },
      grid: {
        show: false
      },
      stroke: {
        curve: "smooth",
        colors: ["#254fdb"]
      }
    }
  }),

  methods: {
    /**
     * Get the currently logged in user's usage history
     */
    async getUsageHistory() {
      try {
        const { data } = await axios.get("/api/usage/analytics", {
          params: {
            type: "TRANSLATE_MONEY_TO_WORDS",
            filter_type: this.selectedTimeFrame
          }
        });
        this.formatusageHistory(data.data);
      } catch (err) {
        console.error(err);
        this.$toasted.show("An error occured while fetching usages data.", {
          type: "error"
        });
      }
    },

    /**
     * Formate usage history response gotten from the backend.
     * This also involves padding the missing days (i.e. days with zero records).
     */
    formatusageHistory(usages) {
      let paddedDates = this.padDates(
        this.getTimeframeDaysAgo(this.selectedTimeFrame)
      );

      Object.entries(usages).forEach(([date, usage]) => {
        paddedDates[date] = usage.quota_used;
      });

      this.chartOptions = {
        ...this.chartOptions,
        ...{
          xaxis: {
            ...this.chartOptions.xaxis,
            categories: Object.keys(paddedDates)
          }
        }
      };

      this.series = [
        {
          name: ucFirst(stripUnderscore(this.selectedTimeFrame)),
          data: Object.values(paddedDates)
        }
      ];
    },

    /**
     * Get the days ago equivalent for a specified timeframe.
     */
    getTimeframeDaysAgo(timeFrame) {
      const f = this.timeFrames.filter(frame => frame.value === timeFrame);
      if (f.length <= 0) throw Error(`Invalid time frame ${timeFrame}`);
      return f[0].noOfDays;
    },

    /**
     * Generate an object of all dates from days ago specified.
     */
    padDates(daysAgo) {
      const days = {};
      const dateStart = moment().subtract(daysAgo, "days");
      const dateEnd = moment();
      while (dateEnd.diff(dateStart, "days") >= 0) {
        days[dateStart.format("Y-MM-DD")] = 0;
        dateStart.add(1, "days");
      }
      return days;
    }
  }
};
</script>

<style scoped>
#chart-usage {
  margin-top: 50px;
  max-height: 500px;
}

.usage__percentage {
  display: flex;
  align-items: center;
  font-weight: 500;
  margin: 10px 0;
}
</style>
