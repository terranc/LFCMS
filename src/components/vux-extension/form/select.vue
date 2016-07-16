<template>
  <select class="weui_select">
    <option value="" v-if="placeholder" :selected="placeholder && !value">{{placeholder}}</option>
    <option :value="item" v-for="(key, item) in processOptions">{{key}}</option>
  </select>
</template>

<style type="scss">
</style>

<script>
const arrayFlip = (trans) => {
  let key;
  const tmpArr = {};
  for (key of trans) {
    tmpArr[key] = key;
  }
  return tmpArr;
};
export default {
  ready() {
    this.$parent.$parent.select = true;
  },
  computed: {
    processOptions() {
      if (this.options.constructor === Array) {
        return arrayFlip(this.options);
      }
      return this.options;
    },
  },
  props: {
    placeholder: String,
    options: {
      type: [Array, Object],
      required: true,
    },
    value: String,
  },
};
</script>
