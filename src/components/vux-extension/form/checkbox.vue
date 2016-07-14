<template>
  <div>
    <input class="weui_check" type="checkbox" :class="className" :value="value" :name="name" />
    <span class="weui_icon_checked"></span>
  </div>
</template>

<style type="scss">
</style>

<script>
export default {
  props: {
    name: String,
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
