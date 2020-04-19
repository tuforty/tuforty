<template>
  <table class="table">
    <thead>
      <tr>
        <th
          v-for="(header, index) in headers"
          :key="index"
          v-bind:class="{
            alignLeft: alignments[index] === 'left',
            alignCenter: alignments[index] === 'center',
            alignRight: alignments[index] === 'right'
          }"
        >
          {{ header }}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item, i) in data" :key="i">
        <td
          v-for="(point, j) in item"
          :key="j"
          v-bind:class="{
            alignLeft: alignments[j] === 'left',
            alignCenter: alignments[j] === 'center',
            alignRight: alignments[j] === 'right'
          }"
        >
          {{ point }}
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  props: {
    headers: Array,
    alignments: Array,
    data: Array
  }
};
</script>

<style>
.table {
  width: 100%;
  font-size: 18px;
  margin: 20px 0;
}

.table thead {
  font-size: 18px;
  color: #00a1ff;
  font-weight: 500;
}

.table th,
td {
  padding: 10px 5px;
}

.alignLeft {
  text-align: left;
}

.alignCenter {
  text-align: center;
}

.alignRight {
  text-align: right;
}
</style>
