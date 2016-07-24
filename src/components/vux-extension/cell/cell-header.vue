<template>
  <div class="weui_cell_hd" :class="className">
    <slot></slot>
  </div>
</template>

<style type="scss">
</style>

<script>
export default {
  props: {
  },
  computed: {
    className() {
      let className = [];
      if (this.$parent.switch) {
        className.push('weui_cell_primary');
      }
      return className;
    },
  },
};
</script>
