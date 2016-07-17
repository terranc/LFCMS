<template>
  <div :id="getId"></div>
</template>

<script>
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
  },
  ready() {
    this.$parent.$parent.form = true;
    $('#' + this.id).uploader({
      auto: this.auto,
      accept: this.accept,
      url: this.url,
      field: this.field,
      title: this.title,
      maxCount: this.maxCount,
      maxWidth: this.maxWidth,
      onAddedFile: this.onChange,
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
