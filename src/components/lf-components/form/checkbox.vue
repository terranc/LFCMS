<template>
  <div>
    <input class="weui_check" type="checkbox" :value="value" :name="name" />
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
  },
  computed: {
  },
  attached() {
    this.$dispatch('cell:toggle-checkbox', true);
    this.$dispatch('group:toggle-checkbox', true);
    this.$dispatch('group:toggle-form', true);
  },
};
</script>
