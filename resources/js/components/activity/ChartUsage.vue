<template>
  <div id="chart-usage" class="card card--plain">
    <h3 class="title">Usage activity</h3>
    <span class="text-success usage__percentage">
      <ion-icon name="arrow-up"></ion-icon>22.9%
    </span>
    <apexchart
      type="line"
      :options="chartOptions"
      :series="series[selectedPeroid]"
      height="300"
    ></apexchart>
    <peroid-switcher
      name="peroid"
      v-model="selectedPeroid"
      :options="peroidOptions"
    ></peroid-switcher>
  </div>
</template>

<script>
export default {
  data: () => ({
    chartOptions: {
      chart: {
        id: "usage",
        toolbar: {
          show: false
        }
      },
      xaxis: {
        categories: [
          "12th",
          "13th",
          "14th",
          "15th",
          "16th",
          "17th",
          "18th",
          "20th"
        ],
        labels: {
          // show: false
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
        curve: "smooth"
      }
    },
    series: {
      day: [
        {
          name: "series-1",
          data: [30, 40, 35, 50, 49, 60, 70, 91]
        }
      ],
      week: [
        {
          name: "series-1",
          data: [30, 64, 22, 50, 43, 60, 70, 23]
        }
      ],
      month: [
        {
          name: "series-1",
          data: [50, 40, 35, 40, 49, 32, 70, 105]
        }
      ],
      year: [
        {
          name: "series-1",
          data: [42, 40, 35, 21, 49, 60, 91, 80]
        }
      ],
      all: [
        {
          name: "series-1",
          data: [29, 40, 35, 50, 49, 50, 70, 42]
        }
      ]
    },
    selectedPeroid: "day",
    peroidOptions: [
      {
        label: "1D",
        value: "day"
      },
      {
        label: "1W",
        value: "week"
      },
      {
        label: "1M",
        value: "month"
      },
      {
        label: "1Y",
        value: "year"
      },
      {
        label: "ALL",
        value: "all"
      }
    ]
  })
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
