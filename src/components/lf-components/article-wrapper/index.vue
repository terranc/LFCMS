<template>
  <div class="rich_media">
    <div class="top_banner"></div>
    <div class="rich_media_inner">
      <div id="page-content">
        <div id="img-content" class="rich_media_area_primary">
          <slot name="title">
            <h2 class="rich_media_title">
              {{ title }} 
            </h2>
          </slot>

          <div class="rich_media_meta_list">
            <em id="post-date" class="rich_media_meta rich_media_meta_text"><slot name="date">{{ date }}</slot></em>
            <em class="rich_media_meta rich_media_meta_text"><slot name="author">{{ author }}</slot></em>
            <a class="rich_media_meta rich_media_meta_link rich_media_meta_nickname" href="javascript:void(0);"><slot name="author-site">{{ authorSite }}</slot></a>
          </div>

          <div class="rich_media_content" v-html="content">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
</style>

<script>
// import Action from 'lf-vuex/actions';
import lazyload from 'lazyloadjs';

/* eslint global-require:off */
const placeholder = require('assets/images/b.gif');

const makeArray = exports.makeArray = Array.from || function (args) {
  return Array.prototype.slice.call(args, 0);
};

const replaceElementSrcToDataSrc = (elms) => {
  makeArray(elms).forEach((elm) => {
    elm.setAttribute('data-src', elm.getAttribute('src'));
    elm.setAttribute('src', placeholder);
  });
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
    date: {
      type: String,
    },
    content: {
      type: String,
    },
  },
  data() {
    return {
      scrollTop: 0,
    };
  },
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
      console.log(images);
      if (images.length > 0) {
        replaceElementSrcToDataSrc(images);
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

