<template>
  <div class="wrapper" id="articles">
    <content-wrapper id="wrap">
      <swiper :list="list" :index="0"></swiper>
      <list-wrapper @on-getmore="fetchData" :is-auto-load="true" target="#wrap">
        <group v-if="listOfArticle">
          <cell v-for="article in listOfArticle" :href="{name: 'article', params: {id: article.id}, query: {t: 123}}">
            {{ article.title }}
          </cell>
        </group>
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
import Action from '../vuex/actions';
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
    Action.Tabbar.show();
  },
  components: {
    ListWrapper,
    ContentWrapper,
    Swiper,
  },
  methods: {
    fetchData(cache, done) {
      if (cache.data.length === 0) {
        this.$http.get(`${this.url}?${querystring.stringify(this.query)}`).then((response) => {
          // list-wrapper 中的 data 与 this.listOfArticle 绑定，直接设置 this.listOfArticle 可更新 list-wrapper 中的 data
          // 然后 list-wrapper 会自动缓存 data 属性，在需要的时候可通过 this.$refs.main.data 访问
          this.listOfArticle = this.listOfArticle.concat(response.data.data);
          done(this.query, this.listOfArticle);
          this.query.page++;
        }, (response) => {
          $.weui.toast('加载异常');
          done(this.query);
        });
      } else {
        this.listOfArticle = cache.data; // 将 list-wrapper 中缓存的数据存入自己的 listOfArticle 中，渲染页面
        this.query.page = cache.query.page;  // 计算页码
        done(this.query);
      }
    },
  },
};
</script>
