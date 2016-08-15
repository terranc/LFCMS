<template>
  <div class="wrapper" id="articles">
    <content-wrapper id="wrap">
      <swiper :list="list" :index="0"></swiper>
      <list-wrapper 
        @on-getmore="fetchData" 
        :auto="true" 
        wrapper="#wrap" 
        load-text="点击加载"
        loading-text="加载中..."
        >
        <div class="weui_panel weui_panel_access">
          <div class="weui_panel_hd">小图文组合列表</div>
          <div class="weui_media_box weui_media_small_appmsg">
            <group v-if="listOfArticle">
              <cell v-for="article in listOfArticle" track-by="id" :href="{name: 'articles2', params: {id: article.id}, query: {t: 123}}">
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
import ListWrapper from 'lf-components/list-wrapper';
import ContentWrapper from 'lf-components/content-wrapper';
import querystring from 'querystring';

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
        url: 'javascript:;',
        img: 'http://7xqzw4.com2.z0.glb.qiniucdn.com/1.jpg',
        title: '如何手制一份秋意的茶？',
      }, {
        url: 'javascript:;',
        img: 'http://7xqzw4.com2.z0.glb.qiniucdn.com/2.jpg',
        title: '茶包VS原叶茶',
      }, {
        url: 'javascript:;',
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
  route: {
  },
  components: {
    ContentWrapper,
    ListWrapper,
  },
  methods: {
    fetchData(cache, loadCallback) {
      if (cache.data.length === 0) {
        this.$http.get(`${this.url}?${querystring.stringify(this.query)}`).then((response) => {
          this.listOfArticle = loadCallback(this.query, response.data.data, response.data.data.length < this.query.limit);
          this.query.page++;
        });
      } else {
        this.listOfArticle = loadCallback(cache.query);
        this.query = cache.query;
      }
    },
  },
};
</script>
