<template>
  <div class="weui_panel">
    <div class="weui_panel_hd">{{ content }}</div>
    <div class="weui_panel_bd">
        <div class="weui_media_box weui_media_text">
            <h4 class="weui_media_title">当前URL</h4>
            <p class="weui_media_desc">{{ $route.path }}</p>
        </div>
        <div class="weui_media_box weui_media_text">
            <h4 class="weui_media_title">当前query</h4>
            <p class="weui_media_desc">{{ $route.query | json 4 }}</p>
        </div>
        <div class="weui_media_box weui_media_text">
            <h4 class="weui_media_title">当前params</h4>
            <p class="weui_media_desc">{{ $route.params | json 4 }}</p>
        </div>
    </div>
  </div>
  <div class="weui_btn_area">
    <x-button type="primary" @click="showAlert">alert</x-button>
  </div>
</template>

<style lang="scss">
</style>

<script>

export default {
  ready() {
  },
  methods: {
    showAlert: () => $.weui.alert('哈哈', { title: '提示' }),
  },
  head: {
    title: {
      inner: '首页',
    },
  },
  data() {
    return {
      content: 'index page',
      create_time: new Date().getTime(),
    };
  },
  components: {
  },
};
</script>
