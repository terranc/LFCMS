<template>
  <input class="weui_check" type="radio" :class="className" :value="value" :name="name" :checked="checked" />
  <span class="weui_icon_checked"></span>
</template>

<style lang="scss">
</style>

<script>
import Base from 'lf-components/mixins/base';
import Mixin from './mixin';
export default {
  props: {
    checked: Boolean,
    name: String,
    value: String,
  },
  created() {
    this.$dispatch('cell:toggle-radio', true);
    this.$dispatch('group:toggle-radio', true);
    this.$dispatch('group:toggle-form', true);
  },
  mixins: [Base, Mixin],
  computed: {
  },
};
</script>
