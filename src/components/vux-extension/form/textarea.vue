<template>
  <textarea class="weui_textarea" v-model="value" :class="className"></textarea>
</template>

<style type="scss">
</style>

<script>
export default {
  props: {
    value: String,
    class: String,
  },
  computed: {
    className() {
      return this.class;
    },
  },
};
</script>
