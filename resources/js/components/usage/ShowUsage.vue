<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">API Usage</div>

          <div class="card-body">
            {{ JSON.stringify(usage) }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      usage: null,
      type: "TRANSLATE_MONEY_TO_WORDS",
      filterType: "LAST_7_DAYS"
    };
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
      } catch (err) {
        alert("Failed to get usage history");
      }
    }
  }
};
</script>
