<template>
  <select class="weui_select">
    <option value="" v-if="placeholder" :selected="placeholder && !value">{{placeholder}}</option>
    <option :value="item" v-for="(key, item) in processOptions">{{key}}</option>
  </select>
</template>

<style lang="scss">
</style>

<script>
import Base from '../base';
import Mixin from './mixin';

const arrayFlip = (trans) => {
  let key;
  const tmpArr = {};
  for (key of trans) {
    tmpArr[key] = key;
  }
  return tmpArr;
};
export default {
  props: {
    placeholder: String,
    options: {
      type: [Array, Object],
      required: true,
    },
    value: String,
  },
  ready() {
    this.$emit('cell:toggle-select', true);
    this.$emit('cells:toggle-select', true);
  },
  mixins: [Base, Mixin],
  computed: {
    processOptions() {
      if (this.options.constructor === Array) {
        return arrayFlip(this.options);
      }
      return this.options;
    },
  },
};
</script>
