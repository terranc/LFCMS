<template>
  <div class="loading">
    <loading :show="isLoading" :text="loadingMessage"></loading>
    <confirm :show.sync="isFail" confirm-text="重新加载" cancel-text="返回" :title="loadFailTitle" @on-confirm="onConfirm" @on-cancel="onCancel">
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
        return '发生异常';
      },
    },
  },
  data() {
    return {
      isLoading: false,
      isFail: false,
      timer: undefined,
    };
  },
  route: {
    data() {
      return {
        isLoading: false,
        isFail: false,
        timer: undefined,
      };
    },
  },
  methods: {
    deferShowLoading(deferTime = 1000) {
      this.timer = setTimeout(() => {
        this.isLoading = true;
        this.isFail = false;
      }, deferTime);
    },
    showLoading() {
      this.timer = clearTimer(this.timer);
      this.isLoading = true;
      this.isFail = false;
    },
    showFail() {
      this.timer = clearTimer(this.timer);
      this.isLoading = false;
      this.isFail = true;
    },
    reset() {
      this.timer = clearTimer(this.timer);
      this.isLoading = false;
      this.isFail = false;
    },
    onConfirm() {
      this.reset();
      // https://github.com/vuejs/vue-router/issues/296
      this.$route.router.replace({
        path: this.$route.router.path,
        query: {
          __t: + new Date(),
        },
      });
    },
    onCancel() {
      this.reset();
    },
  },
  components: {
    Loading,
    Confirm,
  },
};
</script>
