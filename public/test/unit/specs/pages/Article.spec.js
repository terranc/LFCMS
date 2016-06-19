import Vue from 'vue';
import PageArticle from 'src/pages/Article';

describe('Article.vue', () => {
  it('should render correct contents', () => {
    const vm = new Vue({
      template: '<div><page-article></page-article></div>',
      components: { PageArticle },
    }).$mount();
    expect(vm.$el.querySelector('h1').textContent).to.contain('article page');
  });
});
