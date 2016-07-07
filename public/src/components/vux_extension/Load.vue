<template>
  <div class="loading">
    <loading :show="loadState === 'loading'" :text="loadingMessage"></loading>
    <alert :show="loadState === 'fail'" button-text="重新加载" :title="loadFailTitle" @on-hide="onReload">
      <p style="text-align:center;">{{ loadFailMessage }}</p>
    </alert>
  </div>
</template>

<style lang="scss">
</style>

<script>
import Loading from 'vux-components/loading';
import Alert from 'vux-components/alert';

const clearTimer = (timer) => {
  if (timer !== undefined) {
    clearTimeout(timer);
  }
  return undefined;
};

export default {
  props: {
    loadingMessage: {
      type: String,
      default() {
        return '载入中...';
      },
    },
    loadFailMessage: {
      type: String,
      default() {
        return '加载失败';
      },
    },
    loadFailTitle: {
      type: String,
      default() {
        return '错误';
      },
    },
  },
  data() {
    return {
      loadState: 'default',
      timer: undefined,
    };
  },
  route: {
    data() {
      return { loadState: 'default' };
    },
  },
  methods: {
    deferShowLoading(deferTime = 1000) {
      this.timer = setTimeout(() => {
        this.loadState = 'loading';
      }, deferTime);
    },
    showLoading() {
      this.timer = clearTimer(this.timer);
      this.loadState = 'loading';
    },
    showFail() {
      this.timer = clearTimer(this.timer);
      this.loadState = 'fail';
    },
    reset() {
      this.timer = clearTimer(this.timer);
      this.loadState = 'default';
    },
    onReload() {
      this.reset();
      // https://github.com/vuejs/vue-router/issues/296
      this.$route.router.go({
        path: this.$route.router.path,
        query: {
          __t: + new Date(),
        },
      });
    },
  },
  components: {
    Loading,
    Alert,
  },
};
</script>
