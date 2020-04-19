<template>
  <div class="option-switcher">
    <div
      v-for="(option, index) in options"
      :key="index"
      class="option-switcher__option"
    >
      <label
        @click="setSelected(option.value)"
        v-bind:class="{ active: option.value === selected }"
      >
        {{ option.label }}
      </label>
      <input
        :value="option.value"
        type="radio"
        :name="name"
        v-model="selected"
      />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    options: Array,
    selected: String,
    name: String
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

<style>
.option-switcher {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

.option-switcher__option label {
  font-weight: 500;
  color: #333333;
  font-size: 18px;
  margin: 0 20px;
}

.option-switcher__option label.active {
  color: #00a1ff;
}

.option-switcher__option input {
  display: none;
}
</style>
