<template>
  <div class="loading">
    <loading :show="loadState === 'loading'" :text="loadingMessage"></loading>
    <confirm :show.sync="confirmState" confirm-text="重新加载" slot="发生异常" cancel-text="返回" :title="loadFailTitle" @on-confirm="onConfirm" @on-cancel="onCancel">
      <p style="text-align:center;">{{ loadFailMessage }}</p>
    </confirm>
  </div>
</template>

<style lang="scss">
</style>

<script>
import Loading from 'vux-components/loading';
import Confirm from 'vux-components/confirm';

const clearTimer = (timer) => {
  if (timer !== undefined) {
    clearTimeout(timer);
  }
  return undefined;
};

export default {
  props: {
    loadingMessage: {
      type: 'string',
      default() {
        return '载入中...';
      },
    },
    loadFailMessage: {
      type: 'string',
      default() {
        return '加载失败';
      },
    },
    loadFailTitle: {
      type: 'string',
      default() {
        return '错误';
      },
    },
  },
  data() {
    return {
      confirmState: false,
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
      this.confirmState = false;
    },
    showFail() {
      this.timer = clearTimer(this.timer);
      this.loadState = 'fail';
      this.confirmState = true;
    },
    reset() {
      this.timer = clearTimer(this.timer);
      this.loadState = 'default';
      this.confirmState = false;
    },
    onConfirm() {
      this.reset();
      this.$route.router.replace({
        path: this.$route.router.path,
        query: {
          __t: + new Date(),
        },
      });
    },
    onCancel() {
      this.reset();
      window.history.back();
    },
  },
  components: {
    Loading,
    Confirm,
  },
};
</script>
