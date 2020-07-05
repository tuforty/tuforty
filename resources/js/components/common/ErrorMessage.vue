<template>
  <div class="error-message">
    <ion-icon name="sad" size="large"></ion-icon>
    <span>{{ message }}</span>
  </div>
</template>

<script>
export default {
  props: {
    message: String
  }
};
</script>

<style scoped>
.error-message {
  color: #b22222;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.error-message * {
  margin: 5px;
  font-size: 25px;
}
</style>
