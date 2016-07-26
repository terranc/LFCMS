<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div div class="wrapper" id="timeout">
    <main class="main main-footer">
      <tip>请求超时</tip>
      <x-button type="primary" @click="reload">重新加载</x-button> 
    </main>
  </div>
</template>

<style lang="scss">
</style>

<script>
import Status from 'lf-components/status';

export default {
  head: {
    title: {
      inner: '悲剧啦',
    },
  },
  components: {
    Status,
  },
  methods: {
    reload() {
      this.$route.router.go(window.history.back());
    },
  },
};
</script>
