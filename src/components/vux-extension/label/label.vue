<template>
  <label class="weui_label" :class="className" :style="styleObject">
    <slot></slot>
  </label>
</template>

<style lang="scss">
</style>

<script>
export default {
  props: {
    class: String,
    width: String,
  },
  computed: {
    className() {
      return this.class;
    },
    styleObject() {
      if (this.width) {
        return {
          width: this.width + 'em',
        };
      }
    },
  },
};
</script>
