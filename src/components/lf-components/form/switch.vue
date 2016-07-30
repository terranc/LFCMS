<template>
  <input class="weui_switch" type="checkbox" />
</template>

<style lang="scss">
</style>

<script>
import Base from 'lf-components/mixins/base';
import Mixin from './mixin';
export default {
  props: {
  },
  created() {
    this.$dispatch('cell:toggle-switch', true);
    this.$dispatch('group:toggle-switch', true);
    this.$dispatch('group:toggle-form', true);
  },
  mixins: [Base, Mixin],
  computed: {
  },
};
</script>
