<template>
  <input class="weui_check" type="radio" :class="className" :value="value" :name="name" />
  <span class="weui_icon_checked"></span>
</template>

<style lang="scss">
</style>

<script>
import Base from '../base';
import Mixin from './mixin';
export default {
  props: {
    name: String,
    value: String,
  },
  ready() {
    this.$dispatch('toggle-cell-radio', true);
    this.$dispatch('toggle-cells-radio', true);
  },
  mixins: [Base, Mixin],
  computed: {
  },
};
</script>
