<template>
  <div class="feed api-keys__page">
    <h1 class="title">API key</h1>
    <span class="info">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.
    </span>
    <!-- <error-message v-if="error" :message="error"></error-message> -->
    <div class="card api-key__card">
      <!-- <p class="api-key" v-if="loading">Loading ...</p>
      <p class="api-key" v-else-if="tokenVisible">{{token}}</p>
      <p class="api-key" v-else>***************</p>
      <ion-icon name="copy" size="large" v-if="token"></ion-icon>-->
      <p class="api-key" v-if="tokenVisible">ksjrbeirbuebubuebueuevyeveyvey</p>
      <p class="api-key" v-else>***************</p>
      <button
        class="copy-button"
        v-clipboard:copy="message"
        v-clipboard:success="onCopy"
        v-clipboard:error="onCopyError"
      >
        <ion-icon name="copy" size="large"></ion-icon>
      </button>
    </div>
    <!-- <div class="api-keys__actions" v-if="token"> -->
    <div class="api-keys__actions">
      <button class="button button--round fullWidth" @click="toggleToken">
        Hide
      </button>
      <button class="button button--round fullWidth" @click="refreshToken">
        Regenerate
      </button>
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
      error: null,
      message: "Copy These Text"
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
    },

    onCopy: function(e) {
      alert("You just copied: " + e.text);
    },

    onCopyError: function(e) {
      alert("Failed to copy texts");
    }
  }
};
</script>

<style scoped>
.title {
  color: #00a1ff;
  font-size: 40px;
  font-weight: bold;
  text-align: center;
}

.info {
  font-size: 20px;
}

.api-keys__page {
  padding-top: 20vh;
}

.api-key {
  font-size: 18px;
  letter-spacing: 2px;
  text-align: center;
}

.api-key__card {
  display: flex;
  height: 100%;
  align-items: center;
  justify-content: center;
  height: 150px;
  border: none;
}

.api-key__card > * {
  margin: 0 10px;
}

.api-keys__actions {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 10px;
}

.copy-button {
  background: none;
  border: none;
}
</style>
