<template>
  <div class="weui_cells_title" :class="class">
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
