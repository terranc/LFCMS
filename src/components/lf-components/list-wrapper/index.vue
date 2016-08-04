<template>
  <div v-el:list>
    <slot></slot>
    <slot name="loadmore">
      <div class="dropload_down" :class="moreClassName" v-show="data.length > 0 && !loaded" v-touch:tap="onMoreClick">
        <div class="dropload_load">
          <spinner type="ios-small" v-show="state === 'loading'"></spinner>
          {{ moreText }}
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

const getScrollCacheName = (uuid) => `list-scroll-top-cache: ${uuid}`;
const hasScrollCache = (uuid) => !!sessionStorage[getScrollCacheName(uuid)];

const getDataCacheName = (uuid) => `list-data-cache: ${uuid}`;
const hasDataCache = (uuid) => !!sessionStorage[getDataCacheName(uuid)];

const getQueryCacheName = (uuid) => `list-query-cache: ${uuid}`;
const hasQueryCache = (uuid) => !!sessionStorage[getQueryCacheName(uuid)];


export default {
  props: {
    uuid: {
      type: [String, Number],
      required: true,
    },
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
    wrapper: {
      type: String,
      default: 'body',
    },
    loaded: Boolean,
    moreText: String,
  },
  data() {
    return {
      scrollTop: 0,
      data: this.data,
    };
  },
  computed: {
  },
  created() {
    Action.List.remove = this.removeCache;
    this.uuid = this.$route.path;
  },
  components: {
    Group,
    XButton,
    Spinner,
  },
  mixins: [Base],
  ready() {
    document.querySelector(this.wrapper).addEventListener('scroll', (e) => {
      this.scrollTop = e.target.scrollTop;
      if (this.auto && this.state !== 'loading') {
        const totalTop = e.target.scrollTop + e.target.clientHeight;
        e.preventDefault();
        e.stopPropagation();
        if (totalTop >= e.target.scrollHeight - this.distance) {
          this.onMoreClick();
        }
      }
    });
  },
  attached() {
    this.onMoreClick();
    this.$nextTick(() => {
      this.setScrollTopFromCache();
      this.reset();
    });
  },
  beforeDestroy() {
    this.state = '';
    this.cache();
  },
  methods: {
    reset() {
      this.removeCache();
    },
    cache() {
      this.setCache();
    },
    setCache(e) {
      if (this.isCacheScrollPosition) {
        sessionStorage[getScrollCacheName(this.uuid)] = this.scrollTop;
        sessionStorage[getDataCacheName(this.uuid)] = JSON.stringify(this.data);
      }
    },
    setScrollTopFromCache() {
      if (hasScrollCache(this.uuid)) {
        document.querySelector(this.wrapper).scrollTop = sessionStorage[getScrollCacheName(this.uuid)];
      }
    },
    getDataCache() {
      if (hasDataCache(this.uuid)) {
        return JSON.parse(sessionStorage[getDataCacheName(this.uuid)]);
      } else {
        return [];
      }
    },
    setQueryCache(query) {
      sessionStorage[getQueryCacheName(this.uuid)] = JSON.stringify(query || {});
    },
    getQueryCache() {
      if (hasQueryCache(this.uuid)) {
        return JSON.parse(sessionStorage[getQueryCacheName(this.uuid)]);
      } else {
        return {};
      }
    },
    removeCache() {
      sessionStorage.removeItem(getDataCacheName(this.uuid));
      sessionStorage.removeItem(getScrollCacheName(this.uuid));
      sessionStorage.removeItem(getQueryCacheName(this.uuid));
    },
    // more
    onMoreClick() {
      this.$set('state', 'loading');
      this.loadingState = true;
      this.$emit('on-getmore', {
        data: this.getDataCache(),
        query: this.getQueryCache(),
      }, (query, data, isLoaded) => {
        this.loadingState = false;
        this.$set('state', 'done');
        if (data === undefined) {
          this.data = this.getDataCache(); 
        } else {
          this.data = this.data.concat(data || []);
        }
        this.setQueryCache(query);
        this.loaded = !!isLoaded;
        return this.data;
      });
    },
  },
  watch: {
    state(newVal) {
      console.log(newVal);
      if (newVal === 'loading') {
        this.moreText = this.loadingText;
        this.moreClassName = 'dropload_loading';
      } else {
        this.moreText = this.loadText;
        this.moreClassName = 'dropload_load';
      }
    },
  },
};
</script>

