<template>
  <div>
    <input class="weui_check" type="radio" :value="value" :name="name" />
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
};
</script>
