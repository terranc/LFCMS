<template>
  <div class="weui_cell_bd weui_cell_primary" :class="class">
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
};
</script>
