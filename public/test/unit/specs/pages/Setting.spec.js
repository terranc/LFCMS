import Vue from 'vue';
import Setting from 'src/pages/Setting';

describe('Setting.vue', () => {
  it('should render correct contents', () => {
    const vm = new Vue({
      template: '<div><setting></setting></div>',
      components: { Setting },
    }).$mount();
    expect(vm.$el.querySelector('h1').textContent).to.contain('setting page');
  });
});
