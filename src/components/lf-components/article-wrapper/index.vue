<template>
  <div class="rich_media">
    <div class="rich_media_inner">
      <div id="page-content">
        <div class="rich_media_area_primary">
          <slot name="title">
            <h2 class="rich_media_title" v-if="title">
              {{ title }} 
            </h2>
          </slot>

          <div class="rich_media_meta_list" v-if="date || author || authorSite">
            <em id="post-date" class="rich_media_meta rich_media_meta_text" v-if="date"><slot name="date">{{ date }}</slot></em>
            <em class="rich_media_meta rich_media_meta_text" v-if="author"><slot name="author">{{ author }}</slot></em>
            <a class="rich_media_meta rich_media_meta_link rich_media_meta_nickname" v-if="authorSite" :href="authorLink"><slot name="author-site">{{ authorSite }}</slot></a>
          </div>

          <div class="rich_media_content" v-html="content" v-if="content">
          </div>
          <slot></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scope>
a {
  color: #607fa6;
}
</style>

<script>
import Base from 'lf-components/mixins/base';
import lazyload from 'lazyloadjs';

const makeArray = exports.makeArray = Array.from || function (args) {
  return Array.prototype.slice.call(args, 0);
};

const lazyloadElements = (elms, opt) => {
  const loader = lazyload(opt);
  makeArray(elms).forEach((elm) => {
    elm.addEventListener('load', () => {
      loader(elm);
    });
  });
};

const getScrollCacheName = (uuid) => `article-scroll-top-cache: ${uuid}`;
const hasScrollCache = (uuid) => !!sessionStorage[getScrollCacheName(uuid)];

export default {
  props: {
    uuid: {
      type: [String, Number],
      required: true,
    },
    target: {
      type: String,
      default: 'body',
    },
    title: {
      type: String,
    },
    author: {
      type: String,
    },
    authorSite: {
      type: String,
    },
    authorLink: {
      type: String,
      default: 'javascript:;',
    },
    date: {
      type: String,
    },
    content: {
      type: String,
    },
    isImagesLazyLoad: {
      type: Boolean,
      default: true,
    },
  },
  data() {
    return {
      scrollTop: 0,
    };
  },
  mixins: [Base],
  ready() {
    document.querySelector(this.target).addEventListener('scroll', (e) => {
      this.scrollTop = e.target.scrollTop;
      this.cacheScrollTop();
    });
  },
  watch: {
    content() {
      this.setScrollTopFromCache();
      const images = document.querySelectorAll('img');
      if (images.length > 0 && this.isImagesLazyLoad) {
        lazyloadElements(images, {
          offset: 0,
        });
      }
    },
  },
  methods: {
    cacheScrollTop() {
      sessionStorage[getScrollCacheName(this.uuid)] = this.scrollTop;
    },
    setScrollTopFromCache() {
      const target = document.querySelector(this.target);
      let value = 0;
      if (hasScrollCache(this.uuid)) {
        value = sessionStorage[getScrollCacheName(this.uuid)];
      }
      target.scrollTop = value;
    },
  },
};
</script>

