import Vue from 'vue';
import PageArticles from 'pages/Articles';

describe('Articles.vue', () => {
  it('should render correct contents', () => {
    const vm = new Vue({
      template: '<div><page-articles v-ref:content></page-articles></div>',
      components: { PageArticles },
    }).$mount();
    expect(vm.$el.querySelector('h1').textContent).to.contain('articles page');
    expect(vm.$refs.content.$refs.head.title).to.contain('articles');
  });
});
