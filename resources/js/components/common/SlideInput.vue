<template>
  <div class="range-slider-container">
    <div class="range-slider__header">
      <label class="range-slider__label muted" :for="name">{{ label }}</label>
      <span class="range-slider__value">{{ `${value}%` }}</span>
    </div>
    <input type="range" min="10" max="100" class="range-slider" v-model="value" ref="slider" />
  </div>
</template>

<script>
export default {
  mounted() {
    const { slider } = this.$refs;

    this.applyFill(slider);

    slider.addEventListener("input", event => {
      this.applyFill(event.target);
    });
  },
  props: {
    value: Number,
    label: String,
    name: String
  },
  methods: {
    applyFill(slider) {
      const settings = {
        fill: "var(--blue)",
        background: "#d7dcdf"
      };

      const percentage =
        (100 * (slider.value - slider.min)) / (slider.max - slider.min);

      const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${
        settings.background
      } ${percentage + 0.1}%)`;

      slider.style.background = bg;
    }
  }
};
</script>

<style scoped>
.range-slider-container {
  width: 100%;
}

.range-slider {
  -webkit-appearance: none;
  width: 100%;
  height: 10px;
  border-radius: 5px;
  background: var(--blue);
  outline: none;
  padding: 0;
  margin: 0;
}

.range-slider::-webkit-slider-thumb {
  appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: var(--blue);
  cursor: pointer;
  transition: background 0.15s ease-in-out;
}

.range-slider::-moz-range-thumb {
  width: 20px;
  height: 20px;
  border: 0;
  border-radius: 50%;
  background: #999;
  cursor: pointer;
  transition: background 0.15s ease-in-out;
}

.range-slider::-moz-range-thumb:hover {
  background: #333;
}

.range-slider:active::-moz-range-thumb {
  background: #333;
}

.range-slider__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.range-slider__label {
  display: block;
}

.range-slider__value {
  color: var(--blue);
  font-size: 25px;
  font-weight: 500;
}
</style>
