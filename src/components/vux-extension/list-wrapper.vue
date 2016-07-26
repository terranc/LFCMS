<template>
  <slot></slot>
  <slot name="loadmore">
    <div class="weui_btn_area" v-if="data">
      <x-button v-touch:tap="onMoreClick">
        <span>{{ getLoadText }}</span>
      </x-button>
    </div>
  </slot>
</template>

<style lang="scss">
</style>

<script>
import Base from './base';
import Group from 'vux-components/group';
import XButton from 'vux-components/x-button';
import Action from 'src/vuex/actions';

// const getScrollCacheName = (uuid) => `contentWrapperscrollTopCache_${uuid}`;
// const hasScrollCache = (uuid) => !!sessionStorage[getScrollCacheName(uuid)];

// const getDataCacheName = (uuid) => `contentWrapperDataCache_${uuid}`;
// const hasDataCache = (uuid) => !!sessionStorage[getDataCacheName(uuid)];

export default {
  props: {
    isCacheScrollPosition: {
      type: Boolean,
      default: true,
    },
    data: {
      type: Array,
      default: [],
    },
    loadText: {
      type: String,
      default: '点击加载更多',
    },
    loadingText: {
      type: String,
      default: '正在加载中...',
    },
    auto: Boolean,
    distance: {
      type: Number,
      default: 0,
    },
    state: String,
    target: {
      type: String,
      default: 'body',
    },
  },
  data() {
    return {
      scrollTop: 0,
      data: this.data,
    };
  },
  computed: {
    getLoadText() {
      if (this.state === 'loading') {
        return this.loadingText;  
      }
      return this.loadText;
    },
  },
  components: {
    Group,
    XButton,
  },
  mixins: [Base],
  ready() {
    this.onMoreClick();
    document.querySelector(this.target).addEventListener('scroll', (e) => {
      this.scrollTop = e.target.scrollTop;
      if (this.auto && this.state !== 'loading') {
        e.preventDefault();
        e.stopPropagation();
        const totalTop = e.target.scrollTop + e.target.clientHeight;
        if (totalTop >= e.target.scrollHeight - this.distance) {
          this.onMoreClick();
        }
      }
    });
    this.setDataFromCache();
    this.$nextTick(() => {
      this.setScrollTopFromCache();
      this.reset();
    });
  },
  attached() {
  },
  destroyed() {
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
        Action.List.setScrollTop(this.scrollTop);
      }
    },
    removeScrollCache() {
      Action.List.setScrollTop(0);
    },
    setScrollTopFromCache() {
      if (Action.List.getScrollTop() > 0) {
        document.querySelector(this.target).scrollTop = Action.List.getScrollTop();
      }
    },
    // dataCache
    setDataFromCache() {
      if (Action.List.getData()) {
        this.data = Action.List.getData();
      }
    },
    setDataCache() {
      if (this.isCacheScrollPosition) {
        Action.List.setData(this.data);
      }
    },
    removeDataCache() {
      Action.List.removeData();
    },
    // more
    onMoreClick() {
      this.state = 'loading';
      this.$emit('on-getmore', Action.List.get(), (query, data) => {
        this.state = 'done';
        this.data = data;
        Action.List.setQuery(query || {});
      });
    },
  },
};
</script>

