<template>
<<<<<<< HEAD
  <input class="weui_check" type="radio" :class="className" :value="value" :name="name" />
  <span class="weui_icon_checked"></span>
=======
  <div>
    <input class="weui_check" type="radio" :value="value" :name="name" />
    <span class="weui_icon_checked"></span>
  </div>
>>>>>>> 53b59a6b8a5db5cc559ea8c558b5dbcb012442cb
</template>

<style lang="scss">
</style>

<script>
export default {
  props: {
    name: String,
    value: String,
  },
  ready() {
    this.$parent.radio = true;
    this.$parent.$parent.radio = true;
    this.$parent.$parent.form = true;
  },
  computed: {
  },
};
</script>
