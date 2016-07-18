<template>
</template>

<style lang="scss">
</style>

<script>
export default {
  props: {
    data: {
      type: Array,
      default() {
        return [];
      },
    },
    more: {
      type: Boolean,
      default: false,
    },
    autoLoad: {
      type: Boolean,
      default: false,
    },
    api: {
      type: String,
    },
    params: {
      type: String,
    },
    query: {
      type: String,
    },
  },
};
</script>

