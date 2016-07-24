<template>
  <input class="weui_switch" type="checkbox" />
</template>

<style lang="scss">
</style>

<script>
import Base from '../base';
import Mixin from './mixin';
export default {
  props: {
  },
  ready() {
    this.$dispatch('toggle-cell-switch', true);
    this.$dispatch('toggle-cells-switch', true);
  },
  mixins: [Base, Mixin],
  computed: {
  },
};
</script>
