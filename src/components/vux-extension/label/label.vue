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
  },
  computed: {
    className() {
      return this.class;
    },
    styleObject() {
      console.log(this.$el.innerText);
      return {
        width: (this.$el.innerText.replace(/[^x00-xff]/g, '00').length / 2 + 1) + 'em',
      };
    },
  },
};
</script>
