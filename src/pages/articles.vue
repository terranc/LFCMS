<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="articles">
    <list-wrapper
      class="main main-footer"
      v-ref:main
      :data="listOfArticle"
      @on-getmore="fetchData"
      >
      <group :title="content">
        <cell>
          <img class="img-responsive" src="http://static.7192.com/upload/zp/000/287/760/51702/000287760_102959587.jpg">
        </cell>
      </group>
      <group v-if="listOfArticle">
        <cell v-for="article in listOfArticle" :title="article.title" is-link v-link="{name: 'article', params: {id: article.id}, query: {t: 123}}"></cell>
      </group>
    </list-wrapper>
  </div>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';
import ListWrapper from 'components/vux-extension/list-wrapper';
import querystring from 'querystring';
import { LFTabbar } from '../vuex/actions';

export default {
  data() {
    return {
      content: 'articles page',
      title: 'articles',
      listOfArticle: [], // 文章列表，页面中渲染的是这个数据，而不是 list-wrapper 中的 data， list-wrapper 只做数据缓存
      isFetching: false,
      query: {
        page: 1, // 页码
        limit: 10, // 每页数据量
      },
      url: 'https://cnodejs.org/api/v1/topics',
    };
  },
  ready() {
    LFTabbar.show();
    this.getData();
  },
  components: {
    VueHelmet,
    Group,
    Cell,
    ListWrapper,
  },
  methods: {
    fetchData() {
      if (this.isFetching) return;
      this.isFetching = true;
      $.weui.loading();
      this.$http.get(`${this.url}?${querystring.stringify(this.query)}`).then((response) => {
        $.weui.hideLoading();
        // list-wrapper 中的 data 与 this.listOfArticle 绑定，直接设置 this.listOfArticle 可更新 list-wrapper 中的 data
        // 然后 list-wrapper 会自动缓存 data 属性，在需要的时候可通过 this.$refs.main.data 访问
        this.listOfArticle = this.listOfArticle.concat(response.data.data);
        this.query.page += 1;
        this.isFetching = false;
      }, (response) => {
        $.weui.hideLoading();
        this.isFetching = false;
        $.weui.toast('加载异常');
      });
    },
    getData() {
      // 如果 list－wrapper 组件中没有缓存的数据
      // 一般情况是第一次进入该页面
      if (this.$refs.main.data.length === 0) {
        this.fetchData(); // 通过 ajax 获取新数据
      // 如果 list－wrapper 组件有缓存的数据
      // 一般情况是，这个页面之前被初始化过，然后被切换走了，又再切换回来
      } else {
        this.listOfArticle = this.$refs.main.data; // 将 list-wrapper 中缓存的数据存入自己的 listOfArticle 中，渲染页面
        this.query.page = (this.listOfArticle.length / this.query.limit) + 1;  // 计算页码
      }    
    },
  },
};
</script>
