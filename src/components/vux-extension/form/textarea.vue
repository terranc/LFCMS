<template>
  <textarea class="weui_textarea" v-model="value"></textarea>
</template>

<style type="scss">
</style>

<script>
export default {
  props: {
    value: String,
    class: String,
  },
};
</script>
