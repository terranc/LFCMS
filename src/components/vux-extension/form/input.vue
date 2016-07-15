<template>
  <input class="weui_input" :class="className" />
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
