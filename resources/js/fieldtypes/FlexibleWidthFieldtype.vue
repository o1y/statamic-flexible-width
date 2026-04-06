<script setup>
import { Fieldtype } from '@statamic/cms'
import { ref, computed, onMounted } from 'vue'

const emit = defineEmits(Fieldtype.emits)
const props = defineProps(Fieldtype.props)
const { update, expose } = Fieldtype.use(emit, props)

defineExpose(expose)

const isHovering = ref(false)
const hoveringOverIndex = ref(0)
const index = ref(0)

const size = computed(() => props.config.size ?? 'lg')

const wrapperStyle = computed(() => {
  return size.value === 'base'
    ? { height: '1.5rem', width: '3.5rem', fontSize: '0.75rem', borderRadius: '0.375rem' }
    : { height: '2.5rem', width: '6rem', fontSize: '0.875rem', borderRadius: '0.5rem' }
})

const options = computed(() => {
  const opts = props.config.options ?? Array.from(Array(13).keys())
  return Object.entries(opts).map(([key, value]) => ({
    key: key,
    value,
  }))
})

const selectedIndex = computed(() => {
  return isHovering.value ? hoveringOverIndex.value : index.value
})

const selectedOption = computed(() => {
  return isHovering.value ? options.value[hoveringOverIndex.value] : options.value[index.value]
})

function findOptionIndexFromKey(key) {
  const optionIndex = options.value.findIndex((option) => option.key == key)
  return optionIndex !== -1 ? optionIndex : 0
}

function setValue(idx) {
  const selectedOpt = options.value[idx]
  update(selectedOpt.key)
  index.value = idx
}

onMounted(() => {
  index.value = findOptionIndexFromKey(props.value)
  hoveringOverIndex.value = index.value
})
</script>

<template>
  <div
    class="relative flex cursor-pointer overflow-hidden border border-gray-300 bg-white font-mono text-gray-600 antialiased dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400"
    :style="wrapperStyle"
    @mouseenter="isHovering = true"
    @mouseleave="isHovering = false"
  >
    <div class="flex w-full">
      <div
        v-for="(option, idx) in options"
        :key="idx"
        @mouseenter.stop="hoveringOverIndex = idx"
        @click="setValue(idx)"
        class="flex-1 border-y-0 border-l-0 border-r last:border-r-0 dark:border-gray-700"
        :class="{
          'bg-gray-100 dark:bg-gray-900': selectedIndex >= idx,
          'border-gray-300 dark:border-gray-800': selectedIndex === idx && idx !== options.length - 1,
          'border-gray-100 dark:border-gray-900': selectedIndex > idx,
        }"
      />
    </div>
    <div
      class="pointer-events-none absolute inset-0 z-10 flex w-full items-center justify-center text-center font-medium text-gray-900 dark:text-gray-300"
    >
      {{ selectedOption.value }}
    </div>
  </div>
</template>
