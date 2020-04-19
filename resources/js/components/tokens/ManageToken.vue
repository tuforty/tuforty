<template>
  <div class="feed api-keys__page">
    <error-message v-if="error" :message="error"></error-message>
    <div class="card api-key__card" v-else>
      <p class="api-key" v-if="loading">Loading ...</p>
      <p class="api-key" v-else-if="tokenVisible">{{token}}</p>
      <p class="api-key" v-else>***************</p>
      <ion-icon name="copy" size="large" v-if="token"></ion-icon>
    </div>
    <div class="api-keys__actions" v-if="token">
      <button class="button button--round fullWidth" @click="toggleToken">Hide</button>
      <button class="button button--round fullWidth" @click="refreshToken">Regenerate</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      token: null,
      tokenVisible: true,
      error: null
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
      this.loading = true;
      try {
        const { data } = await axios.get("/api/token");
        this.token = data.token || "";
      } catch (error) {
        this.error = error.message;
      } finally {
        this.loading = false;
      }
    },

    async refreshToken() {
      this.loading = true;
      const { data } = await axios.get("/api/token/refresh");
      this.token = data.token;
      this.loading = false;
    }
  }
};
</script>

 <style  scoped>
.api-keys__page {
  padding-top: 20vh;
}

.api-key {
  font-size: 30px;
  letter-spacing: 2px;
  text-align: center;
}

.api-key__card {
  display: flex;
  height: 100%;
  align-items: center;
  justify-content: center;
  height: 150px;
}

.api-key__card > * {
  margin: 0 10px;
}

.api-keys__actions {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 10px;
}
</style>
