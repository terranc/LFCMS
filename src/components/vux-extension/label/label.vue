<template>
  <label class="weui_label" :class="className">
    <slot></slot>
  </label>
</template>

<style type="scss">
</style>

<script>
export default {
  props: {
    class: String,
  },
  computed: {
    className() {
      return this.class;
    },
  },
};
</script>
