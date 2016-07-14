<template>
  <div class="weui_cells_tips" :class="class">
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
