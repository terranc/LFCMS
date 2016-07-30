<template>
  <select class="weui_select">
    <option value="" v-if="placeholder" :selected="placeholder && !value">{{placeholder}}</option>
    <option :value="item" v-for="(key, item) in processOptions">{{key}}</option>
  </select>
</template>

<style lang="scss">
</style>

<script>
import Base from 'lf-components/mixins/base';
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
  created() {
    this.$dispatch('cell:toggle-select', true);
    this.$dispatch('group:toggle-select', true);
    this.$dispatch('group:toggle-form', true);
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
