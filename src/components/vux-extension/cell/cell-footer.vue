<template>
  <div class="weui_cell_ft" :class="className">
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
      return this.class;
    },
  },
};
</script>
