<template>
  <div class="wrapper" id="article">
    <content-wrapper id="wrap">
      <article-wrapper 
        :uuid="$route.params.id"
        :author="article.author.loginname"
        :date="article.create_at | friendlyTime"
        :content="article.content"
        target="#wrap"
        >
        <h2 slot="title">{{ article.title }}</h2>
      </article-wrapper>
    </content-wrapper>
  </div>
</template>

<style lang="scss" scoped>
</style>

<script>
import ContentWrapper from 'lf-components/content-wrapper';
import ArticleWrapper from 'lf-components/article-wrapper';

export default {
  head: {
    title() {
      return {
        inner: this.$route.params.id,
      };
    },
  },
  data() {
    return {
      article: {},
    };
  },
  route: {
    data() {
      $.weui.loading('加载中...');
      return this.$http.get(`https://cnodejs.org/api/v1/topic/${this.$route.params.id}`).then((response) => {
        $.weui.hideLoading();
        this.article = response.data.data;
      }, () => {
        $.weui.hideLoading();
        $.weui.toast('加载异常');      
      });
    },
  },
  components: {
    ContentWrapper,
    ArticleWrapper,
  },
};
</script>

