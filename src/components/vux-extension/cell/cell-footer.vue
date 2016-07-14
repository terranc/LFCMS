<template>
  <div class="weui_cell_ft" :class="class">
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
