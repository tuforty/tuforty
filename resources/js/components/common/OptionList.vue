<template>
  <div class="card card--plain option-list">
    <h1 class="title">{{ title }}</h1>
    <span class="description muted">{{ description }}</span>
    <button
      class="option-list__option"
      v-for="(option, index) in options"
      :key="index"
      @click="setSelected(option.value)"
    >
      <label class="option-list__option__label">{{ option.label }}</label>
      <span class="muted option-list__option__description">{{
        option.description
      }}</span>
      <div class="option-list__option__icon">
        <ion-icon
          name="checkmark"
          size="large"
          v-if="option.value === selected"
        ></ion-icon>
      </div>
    </button>
  </div>
</template>

<script>
export default {
  props: {
    selected: String,
    options: Array,
    title: String,
    description: String
  },
  model: {
    prop: "selected",
    event: "change"
  },
  methods: {
    setSelected(value) {
      this.$emit("change", value);
    }
  }
};
</script>

<style scoped>
.option-list {
  display: flex;
  flex-direction: column;
  font-size: 18px;
}

.option-list > * {
  margin: 10px 0;
}

.option-list__option {
  display: flex;
  align-items: center;
  justify-content: space-between;
  grid-template-columns: 0.5fr 1fr 0.5fr;
  font-family: "SQ Market";
  background: none;
  border: none;
  width: 100%;
  border-top: 1px solid #ebebeb;
  padding: 20px 5px 0 5px;
  height: 70px;
  box-sizing: border-box;
}

.option-list__option__label {
  width: 25%;
}

.option-list__option__description {
  width: 50%;
  font-size: 15px;
}

.option-list__option__icon {
  width: 20%;
  justify-self: end;
}

.option-list__option:first-of-type {
  margin-top: 40px;
}

.option-list ion-icon {
  color: #64d359;
}

.title {
  font-weight: normal;
  text-align: center;
}

.description {
  font-weight: 15px;
  font-weight: 200;
  text-align: center;
}
</style>
