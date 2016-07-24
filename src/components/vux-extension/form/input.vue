<template>
  <input class="weui_input" v-model="value" v-el:input />
</template>

<style type="scss">
</style>

<script>
import Base from '../base';
import Mixin from './mixin';
export default {
  props: {
    value: {
      type: String,
      default: '',
      twoWay: true,
    },
  },
  mixins: [Base, Mixin],
  computed: {
  },
  watch: {
    value(newVal) {
      this.$emit('on-input', newVal);
    },
  },
};
</script>
