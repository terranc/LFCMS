<template>
  <label class="weui_label" :class="className" :style="styleObject">
    <slot></slot>
  </label>
</template>

<style lang="scss">
</style>

<script>
import Base from 'lf-components/mixins/base';
export default {
  props: {
    size: [String, Number],
    class: String,
  },
  mixins: [Base],
  computed: {
    className() {
      return this.class;
    },
    styleObject() {
      return {
        width: this.size ? (this.size + 'em') : (this._slotContents.default.textContent.replace(/[^x00-xff]/g, '00').length / 2 + 1) + 'em',
      };
    },
  },
};
</script>
