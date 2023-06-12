<template>
  <div class="width-fieldtype">
    <div class="width-fieldtype field-width-selector" @mouseenter="isHovering = true" @mouseleave="isHovering = false">
      <div class="w-full flex">
        <div
          v-for="(option, index) in options"
          :key="index"
          @mouseenter.stop="hoveringOverIndex = index"
          @click="setValue(index)"
          :class="[
            'field-width-notch',
            'notch-' + index,
            { filled: selectedIndex >= index, selected: selectedIndex == index },
          ]"
        />
      </div>
      <div class="field-width-label">{{ selectedOption.value }}</div>
    </div>
  </div>
</template>

<script>
export default {
  mixins: [Fieldtype],

  data() {
    return {
      isHovering: false,
      hoveringOverIndex: 0,
      index: 0,
    }
  },

  computed: {
    selectedIndex() {
      return this.isHovering ? this.hoveringOverIndex : this.index
    },

    selectedOption() {
      return this.isHovering ? this.options[this.hoveringOverIndex] : this.options[this.index]
    },

    options() {
      return Object.entries(this.config.options).map(([key, value]) => ({
        key: key,
        value,
      }))
    },
  },

  methods: {
    setValue(index) {
      const selectedOption = this.options[index]
      this.$emit('input', selectedOption.key)
      this.index = index
    },

    findOptionIndexFromKey(key) {
      let optionIndex = this.options.findIndex((option) => option.key == key)

      if (optionIndex !== -1) {
        return optionIndex
      }

      return 0
    },
  },

  mounted() {
    this.index = this.findOptionIndexFromKey(this.value)
    this.hoveringOverIndex = this.index
  },
}
</script>
