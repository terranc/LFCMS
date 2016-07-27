<template>
  <input class="weui_switch" type="checkbox" />
</template>

<style lang="scss">
</style>

<script>
import Base from '../../base';
import Mixin from './mixin';
export default {
  props: {
  },
  ready() {
    this.$emit('cell:toggle-switch', true);
    this.$emit('cells:toggle-switch', true);
  },
  mixins: [Base, Mixin],
  computed: {
  },
};
</script>
