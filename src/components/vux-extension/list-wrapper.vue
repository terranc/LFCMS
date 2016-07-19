<template>
  <div v-el:main @scroll="onScroll">
    <slot></slot>
    <group v-if="data && isAutoLoad === false">
      <x-button @click="onMoreClick">
        <span v-if="!isFetching">加载更多</span>
        <spinner :type="iconTypeOfLoadMore" v-if="isFetching"></spinner>
      </x-button>
    </group>
    <load v-ref:load></load>
  </div>
</template>

<style lang="scss">
</style>

<script>
import Group from 'vux-components/group';
import Spinner from 'vux-components/spinner';
import XButton from 'vux-components/x-button';
import Load from 'components/vux-extension/load';
import querystring from 'querystring';

export default {
  props: {
    uuid: {
      type: Number,
      default: + new Date(),
    },
    isSaveScrollPosition: {
      type: Boolean,
      default: true,
    },
    data: {
      type: [Object, Array],
    },
    url: {
      type: String,
    },
    query: {
      type: Object,
    },
    isAutoLoad: {
      type: Boolean,
      default: false,
    },
    isFetching: {
      type: Boolean,
      default: false,
    },
    autoLoadDistance: {
      type: Number,
      default: 1,
    },
    loadingDefer: {
      type: Number,
      default: 0,
    },
    iconTypeOfLoadMore: {
      type: String,
      default: 'ios',
    },
    onFetchStart: {
      type: Function,
    },
    onFetchDone: {
      type: Function,
    },
    onFetchError: {
      type: Function,
    },
  },
  components: {
    Group,
    Load,
    Spinner,
    XButton,
  },
  ready() {
    window.addEventListener('beforeunload', () => {
      this.reset();
    });
  },
  attached() {
    this.setDataFromCache();
    this.$emit('on-attached', this.data);
    this.$nextTick(() => {
      this.setScrollTopFromCache();
    });
  },

  methods: {
    reset() {
      this.removeScrollCache();
      this.removeDataCache();
    },
    cache() {
      this.setScrollCache();
      this.setDataCache();
    },
    // scroll
    setScrollCache(e) {
      sessionStorage[`scrollTop_${this.uuid}`] = this.$els.main.scrollTop;
    },
    removeScrollCache() {
      sessionStorage.removeItem(`scrollTop_${this.uuid}`);
    },
    setScrollTopFromCache() {
      if (this.isSaveScrollPosition) {
        this.$els.main.scrollTop = sessionStorage[`scrollTop_${this.uuid}`];
      }
    },
    // dataCache
    fetchData(option = { url: this.url, query: this.query }) {
      this.url = option.url || this.url;
      this.query = option.query || this.query;
      this.isFetching = true;
      this.$emit('on-fetch-start');
      this.$refs.load.deferShowLoading(this.loadingDefer);
      return this.$http.get(`${this.url}?${querystring.stringify(this.query)}`).then((response) => {
        this.isFetching = false;
        this.$refs.load.reset();
        this.data = response.data;
        this.$emit('on-fetch-done', response);
        return response;
      }, (response) => {
        this.isFetching = false;
        this.$refs.load.showFail();
        this.$emit('on-fetch-error', response);
        return response;
      });    
    },
    setDataFromCache() {
      if (sessionStorage[`contentWrapperDataCache_${this.uuid}`]) {
        this.data = JSON.parse(sessionStorage[`contentWrapperDataCache_${this.uuid}`]);
      }
    },
    setDataCache() {
      sessionStorage[`contentWrapperDataCache_${this.uuid}`] = JSON.stringify(this.data);
    },
    removeDataCache() {
      sessionStorage.removeItem(`contentWrapperDataCache_${this.uuid}`);
    },
    // onScroll
    onScroll(e) {
      if (!this.isFetching && this.isAutoLoad) {
        const targetElm = e.target;
        const totalTop = targetElm.scrollTop + targetElm.clientHeight;
        if (totalTop >= targetElm.scrollHeight - this.autoLoadDistance) {
          this.onGetMore();
        }
      }
    },
    // more
    onMoreClick() {
      this.onGetMore();
    },
    onGetMore() {
      // this.query[this.limitKey] += this.increment;
      // this.fetchData();
      this.$emit('on-getmore', {
        url: this.url,
        query: this.query,
      });
    },
  },
};
</script>

