<template>
  <div v-el:main @scroll="onScroll">
    <slot></slot>
    <slot name="loadmore">
      <group v-if="data && isAutoLoad === false">
        <x-button @click="onMoreClick">
          <span>加载更多</span>
        </x-button>
      </group>
    </slot>
  </div>
</template>

<style lang="scss">
</style>

<script>
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
    uuid: {
      type: Number,
      default: + new Date(),
    },
  },
  components: {
    Group,
    XButton,
  },
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
        sessionStorage[getScrollCacheName(this.uuid)] = this.$els.main.scrollTop;
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
      if (this.isAutoLoad) {
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
      this.$emit('on-getmore');
    },
  },
};
</script>

