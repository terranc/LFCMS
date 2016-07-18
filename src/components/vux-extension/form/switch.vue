<template>
  <input class="weui_switch" type="checkbox" />
</template>

<style lang="scss">
</style>

<script>
export default {
  ready() {
    this.$parent.$parent.switch = true;
  },
  props: {
  },
  ready() {
    this.$parent.switch = true;
    this.$parent.$parent.switch = true;
    this.$parent.$parent.form = true;
  },
  computed: {
  },
};
</script>
