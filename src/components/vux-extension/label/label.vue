<template>
  <label class="weui_label" :class="class">
    <slot></slot>
  </label>
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
