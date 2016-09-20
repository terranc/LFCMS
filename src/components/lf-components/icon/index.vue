<template>
  <i class="icon material-icons" :class="className" style="styleObject"><slot></slot></i>
</template>

<style lang="scss">
</style>

<script>
import Base from 'lf-components/mixins/base';
export default {
  props: {
    size: [String, Number],
  },
  mixins: [Base],
  computed: {
    className() {
      return this.class;
    },
    styleObject() {
      return {
        fontSize: this.size ? (this.size + 'rem') : '1rem',
      };
    },
  },
};
</script>
