<template>
  <div :id="getId"></div>
</template>

<style>
.weui_uploader_hd {
  padding-top: 0;
  padding-right: 0;
  padding-left: 0;
}
</style>
<script>
import Base from 'lf-components/mixins/base';
import Mixin from './mixin';
export default {
  props: {
    id: String,
    auto: {
      type: Boolean,
      default: true,
      coerce: (val) => !!val,
    },
    field: String,
    url: String,
    data: {
      type: Object,
      default: {},
    },
    multiple: {
      type: Boolean,
      coerce: (val) => !!val,
    },
    accept: {
      type: Array,
      default: () => ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'],
    },
    title: {
      type: String,
      default: '图片上传',
    },
    maxCount: {
      type: Number,
      default: 4,
      required: false,
      validator(value) {
        return value > 0;
      },
    },
    maxWidth: {
      type: Number,
      default: 500,
      required: false,
      validator(value) {
        return value > 0;
      },
    },
    onChange: {
      type: Function,
      default: (file) => {},
    },
    onSuccess: {
      type: Function,
      default: (res) => {},
    },
    onRemovedfile: {
      type: Function,
      default: (index) => {},
    },
    onError: {
      type: Function,
      default: (errors) => {},
    },
    onComplete: {
      type: Function,
      default: () => {},
    },
  },
  mixins: [Base, Mixin],
  created() {
    this.$dispatch('group:toggle-form', true);
  },
  ready() {
    $('#' + this.id).uploader({
      auto: this.auto,
      accept: this.accept,
      url: this.url,
      data: this.data,
      field: this.field,
      title: this.title,
      maxCount: this.maxCount,
      maxWidth: this.maxWidth,
      onAddedFile: this.onChange,
      onSuccess: this.onSuccess,
      onError: this.onError,
      onComplete: this.onComplete,
      onRemovedfile: this.onRemovedfile,
    });
  },
  computed: {
    getId() {
      if (!this.id) {
        this.id = 'uploader-' + Math.random().toString(36).substring(2);
      }
      return this.id;
    },
  },
};
</script>
