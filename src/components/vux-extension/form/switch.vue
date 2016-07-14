<template>
  <input class="weui_switch" type="checkbox" :class="className" />
</template>

<style type="scss">
</style>

<script>
export default {
  props: {
    class: String,
  },
  computed: {
    className() {
      return this.class;
    },
  },
};
</script>
