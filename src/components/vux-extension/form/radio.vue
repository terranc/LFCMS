<template>
  <input class="weui_check" type="radio" :class="className" :value="value" :name="name" />
  <span class="weui_icon_checked"></span>
</template>

<style lang="scss">
</style>

<script>
export default {
  props: {
    name: String,
    value: String,
    class: String,
  },
  ready() {
    this.$parent.radio = true;
    this.$parent.$parent.radio = true;
    this.$parent.$parent.form = true;
  },
  computed: {
    className() {
      return this.class;
    },
  },
};
</script>
