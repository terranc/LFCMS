<template>
  <select class="weui_select">
    <option value="" v-if="placeholder" :selected="placeholder && !value">{{placeholder}}</option>
    <option :value="item" v-for="(key, item) in processOptions">{{key}}</option>
  </select>
</template>

<style lang="scss">
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
  props: {
    placeholder: String,
    options: {
      type: [Array, Object],
      required: true,
    },
    value: String,
  },
  ready() {
    this.$parent.select = true;
    this.$parent.$parent.select = true;
    this.$parent.$parent.form = true;
  },
  computed: {
    processOptions() {
      if (this.options.constructor === Array) {
        return arrayFlip(this.options);
      }
      return this.options;
    },
=======
>>>>>>> 53b59a6b8a5db5cc559ea8c558b5dbcb012442cb
  },
};
</script>
