<template>
  <div id="api-key">
    <h2 class="title">Credential</h2>
    <div class="card card--plain">
      <div class="api-key__container">
        <p class="api-key" v-if="loading">Loading...</p>
        <p class="api-key" v-else-if="tokenVisible">{{ token }}</p>
        <p class="api-key" v-else>{{ token | hash }}</p>
      </div>
      <div class="api-keys__actions">
        <button class="button button--link button--dark" @click="toggleToken">
          <ion-icon
            :name="tokenVisible ? 'eye-off' : 'eye'"
            size="large"
          ></ion-icon>
        </button>
        <button class="button button--link button--dark" @click="refreshToken">
          <ion-icon name="refresh" size="large"></ion-icon>
        </button>
        <button
          class="button button--link button--dark"
          v-clipboard:copy="token"
          v-clipboard:success="onCopy"
          v-clipboard:error="onCopyError"
        >
          <ion-icon name="copy" size="large"></ion-icon>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      tokenVisible: false,
      error: null,
      token: ""
    };
  },

  mounted() {
    this.getToken();
  },

  filters: {
    hash(str) {
      return "*".repeat(str.length);
    }
  },
  methods: {
    toggleToken() {
      this.tokenVisible = !this.tokenVisible;
    },

    async getToken() {
      this.loading = true;
      try {
        const { data } = await axios.get("/api/v1/token");
        this.token = data.token || "";
      } catch (error) {
        this.error = error.message;
      } finally {
        this.loading = false;
      }
    },

    async refreshToken() {
      this.loading = true;
      const { data } = await axios.get("/api/v1/token/refresh");
      this.token = data.token;
      this.loading = false;
    },

    onCopy(e) {
      this.$toast.open("Token copied to clipboard.");
    },

    onCopyError(e) {
      this.$toast.error("Failed to copy token to clipboard.");
    }
  }
};
</script>

<style scoped>
#api-key {
  display: flex;
  flex-direction: column;
  width: 100%;
  height: 100%;
  box-sizing: border-box;
}

#api-key .card {
  flex: 1;
}

.api-key {
  font-size: 1.2vmin;
  letter-spacing: 2px;
  text-align: center;
  color: var(--blue);
  animation: fadeIn 1s ease-in-out;
}

.api-key__container {
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  margin: 35px 0;
}

.api-keys__actions {
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}
</style>
