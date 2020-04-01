<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">API Token</div>

          <div class="card-body">
            Token is:
            <span v-if="tokenVisible">{{token}}</span>
          </div>

          <button @click="toggleToken">Toggle Token</button>
          <button @click="refreshToken">Refresh token</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      token: null,
      tokenVisible: true
    };
  },

  mounted() {
    this.getToken();
  },

  methods: {
    toggleToken() {
      this.tokenVisible = !this.tokenVisible;
    },

    async getToken() {
      const { data } = await axios.get("/api/token");
      this.token = data.token || "";
    },

    async refreshToken() {
      const { data } = await axios.get("/api/token/refresh");
      this.token = data.token;
    }
  }
};
</script>
