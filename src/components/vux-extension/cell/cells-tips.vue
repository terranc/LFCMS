<template>
  <div class="weui_cells_tips" :class="className">
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
