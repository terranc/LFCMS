<template>
  <input class="weui_check" type="checkbox" :class="className" :value="value" :name="name" />
  <span class="weui_icon_checked"></span>
</template>

<style lang="scss">
</style>

<script>
export default {
  props: {
    name: String,
    value: String,
  },
  ready() {
    this.$parent.checkbox = true;
    this.$parent.$parent.checkbox = true;
    this.$parent.$parent.form = true;
  },
  computed: {
  },
};
</script>
