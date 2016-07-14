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
    class: String,
  },
  computed: {
    className() {
      return this.class;
    },
  },
};
</script>
