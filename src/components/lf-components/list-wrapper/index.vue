<template>
  <div>
    <slot></slot>
    <slot name="loadmore">
      <div class="dropload_down" :class="moreClassName" v-show="data.length > 0 && !loaded" v-touch:tap="onMoreClick">
        <div class="dropload_load">
          <spinner type="ios-small" v-show="state === 'loading'"></spinner>
          {{ loadText }}
        </div>
      </div>
    </slot>
    <loading :show="state === 'loading'" text="数据加载中..."></loading>
  </div>
</template>

<style lang="scss" scope>
.dropload_down {
    position: relative;
    height: 0;
    overflow: hidden;
    font-size: 0.9rem;
    -webkit-transform: translateZ(0);
    transform: translateZ(0)
}

.dropload_down {
    height: 50px
}

.dropload_loading, .dropload_load {
    height: 50px;
    line-height: 50px;
    text-align: center
}
</style>

<script>
import Base from 'lf-components/mixins/base';
import Group from 'vux-components/group';
import XButton from 'vux-components/x-button';
import Action from 'src/vuex/actions';
import Spinner from 'vux-components/spinner';

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
    loaded: Boolean,
  },
  data() {
    return {
      scrollTop: 0,
      data: this.data,
    };
  },
  computed: {
  },
  components: {
    Group,
    XButton,
    Spinner,
  },
  mixins: [Base],
  ready() {
    this.reset();
    Action.List.setQuery({});
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
  },
  attached() {
    console.log('attached');
    // this.setDataFromCache();
    this.$nextTick(() => {
      this.setScrollTopFromCache();
      this.reset();
    });
  },
  detached() {
    console.log('detached');
    this.cache();
  },
  beforeDestroy() {
    console.log('destroyed');
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
      this.loadingState = true;
      this.$emit('on-getmore', Action.List.get(), (query, data, isLoaded) => {
        this.loadingState = false;
        this.state = 'done';
        if (data === undefined) {
          this.data = Action.List.get().data; 
        } else {
          this.data = this.data.concat(data || []);
        }
        Action.List.setQuery(query || {});
        this.loaded = !!isLoaded;
        return this.data;
      });
    },
  },
  watch: {
    state(newVal) {
      if (newVal === 'loading') {
        this.loadTextDefaultValue = this.loadText;
        this.loadText = this.loadingText;
        this.moreClassName = 'dropload_loading';
      } else {
        this.loadText = this.loadTextDefaultValue;
        this.moreClassName = 'dropload_load';
      }
    },
  },
};
</script>

