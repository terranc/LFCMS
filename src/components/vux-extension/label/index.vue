<template>
  <label class="weui_label" :class="className" :style="styleObject">
    <slot></slot>
  </label>
</template>

<style lang="scss">
</style>

<script>
import Base from '../base';
export default {
  props: {
    class: String,
  },
  mixins: [Base],
  computed: {
    className() {
      return this.class;
    },
    styleObject() {
      return {
        width: (this._slotContents.default.textContent.replace(/[^x00-xff]/g, '00').length / 2 + 1) + 'em',
      };
    },
  },
};
</script>
