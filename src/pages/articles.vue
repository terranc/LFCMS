<template>
  <div class="wrapper" id="articles">
    <content-wrapper id="wrap">
      <swiper :list="list" :index="0"></swiper>
      <list-wrapper @on-getmore="fetchData" target="#wrap">
        <div class="weui_panel">
          <div class="weui_panel_hd">小图文组合列表</div>
          <div class="weui_media_box weui_media_small_appmsg">
            <group v-if="listOfArticle">
              <cell v-for="article in listOfArticle" :href="{name: 'article', params: {id: article.id}, query: {t: 123}}">
                <slot slot="body">{{ article.title }}</slot>
              </cell>
            </group>
          </div>
        </div>
      </list-wrapper>
    </content-wrapper>
  </div>
</template>

<style lang="scss">
</style>

<script>
import ListWrapper from 'vux-extension/list-wrapper';
import ContentWrapper from 'vux-extension/content-wrapper';
import querystring from 'querystring';
import Swiper from 'vux-components/swiper';

export default {
  head: {
    title: {
      inner: 'articles',
    },
  },
  data() {
    return {
      content: 'articles page',
      list: [{
        url: 'javascript:',
        img: 'http://7xqzw4.com2.z0.glb.qiniucdn.com/1.jpg',
        title: '如何手制一份秋意的茶？',
      }, {
        url: 'javascript:',
        img: 'http://7xqzw4.com2.z0.glb.qiniucdn.com/2.jpg',
        title: '茶包VS原叶茶',
      }, {
        url: 'javascript',
        img: 'http://7xqzw4.com2.z0.glb.qiniucdn.com/3.jpg',
        title: '播下茶籽，明春可发芽？',
      }],
      listOfArticle: [], // 文章列表，页面中渲染的是这个数据，而不是 list-wrapper 中的 data， list-wrapper 只做数据缓存
      query: {
        page: 1, // 页码
        limit: 10, // 每页数据量
      },
      url: 'https://cnodejs.org/api/v1/topics',
    };
  },
  ready() {
  },
  components: {
    ListWrapper,
    ContentWrapper,
    Swiper,
  },
  methods: {
    fetchData(cache, loadCallback) {
      if (cache.data.length === 0) {
        this.$http.get(`${this.url}?${querystring.stringify(this.query)}`).then((response) => {
          this.listOfArticle = loadCallback(this.query, response.data.data);
          this.query.page++;
        });
      } else {
        this.listOfArticle = loadCallback(this.query, cache.data);
        this.query = cache.query;
      }
    },
  },
};
</script>
