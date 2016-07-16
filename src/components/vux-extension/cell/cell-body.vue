<template>
  <div class="weui_cell_bd weui_cell_primary" :class="className">
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
