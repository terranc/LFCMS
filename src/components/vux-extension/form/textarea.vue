<template>
  <textarea class="weui_textarea" v-model="value"></textarea>
</template>

<style type="scss">
</style>

<script>
import Base from '../base';
import Mixin from './mixin';
export default {
  props: {
    value: String,
  },
  mixins: [Base, Mixin],
  computed: {
  },
};
</script>
