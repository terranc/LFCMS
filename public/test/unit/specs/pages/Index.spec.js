import Vue from 'vue';
import Index from 'src/pages/Index';

describe('Index.vue', () => {
  it('should render correct contents', () => {
    const vm = new Vue({
      template: '<div><index></index></div>',
      components: { Index },
    }).$mount();
    expect(vm.$el.querySelector('h1').textContent).to.contain('index page');
  });
});
