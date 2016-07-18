<template>
  <input class="weui_input" />
</template>

<style lang="scss">
</style>

<script>
export default {
  props: {
    warn: {
      type: Boolean,
    },
  },
  computed: {
  },
  ready() {
    this.$parent.$parent.form = true;
    if (this.warn) this.$parent.warn = true;
  },
};
</script>
