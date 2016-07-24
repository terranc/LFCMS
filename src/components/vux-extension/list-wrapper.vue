<template>
  <div v-el:main @scroll="onScroll">
    <slot></slot>
    <slot name="loadmore">
      <div class="weui_btn_area" v-if="data && isAutoLoad === false">
        <x-button @click="onMoreClick">
          <span>{{ isAutoLoad ? '' : '点击'}}加载更多</span>
        </x-button>
      </div>
    </slot>
  </div>
</template>

<style lang="scss">
</style>

<script>
import Base from './base';
import Group from 'vux-components/group';
import XButton from 'vux-components/x-button';

const getScrollCacheName = (uuid) => `contentWrapperscrollTopCache_${uuid}`;
const hasScrollCache = (uuid) => !!sessionStorage[getScrollCacheName(uuid)];

const getDataCacheName = (uuid) => `contentWrapperDataCache_${uuid}`;
const hasDataCache = (uuid) => !!sessionStorage[getDataCacheName(uuid)];

export default {
  props: {
    isCacheScrollPosition: {
      type: Boolean,
      default: true,
    },
    isCacheData: {
      type: Boolean,
      default: true,    
    },
    data: {
      type: [Object, Array],
    },
    isAutoLoad: {
      type: Boolean,
      default: false,
    },
    autoLoadDistance: {
      type: Number,
      default: 1,
    },
  },
  data() {
    return {
      scrollTop: 0,
    };
  },
  components: {
    Group,
    XButton,
  },
  mixin: [Base],
  ready() {
    window.addEventListener('beforeunload', () => {
      this.reset();
    });
  },
  attached() {
    this.setDataFromCache();
    this.$nextTick(() => {
      this.setScrollTopFromCache();
    });
  },
  detached() {
    this.cache();
  },
  methods: {
    // api
    reset() {
      this.removeScrollCache();
      this.removeDataCache();
    },
    cache() {
      this.setScrollCache();
      this.setDataCache();
    },
    // scrollCache
    setScrollCache(e) {
      if (this.isCacheScrollPosition) {
        sessionStorage[getScrollCacheName(this.uuid)] = this.scrollTop;
      }
    },
    removeScrollCache() {
      if (hasScrollCache(this.uuid)) {
        sessionStorage.removeItem(getScrollCacheName(this.uuid));
      }
    },
    setScrollTopFromCache() {
      if (hasScrollCache(this.uuid)) {
        this.$els.main.scrollTop = sessionStorage[getScrollCacheName(this.uuid)];
      }
    },
    // dataCache
    setDataFromCache() {
      if (hasDataCache(this.uuid)) {
        this.data = JSON.parse(sessionStorage[getDataCacheName(this.uuid)]);
      }
    },
    setDataCache() {
      if (this.isCacheData) {
        sessionStorage[getDataCacheName(this.uuid)] = JSON.stringify(this.data);
      }
    },
    removeDataCache() {
      if (hasDataCache(this.uuid)) {
        sessionStorage.removeItem(getDataCacheName(this.uuid));
      }
    },
    // onScroll
    onScroll(e) {
      const targetElm = e.target;
      this.scrollTop = targetElm.scrollTop;
      if (this.isAutoLoad) {
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
      this.$emit('on-getmore');
    },
  },
};
</script>

