import Vue from 'vue';
import Setting from 'pages/Setting';

describe('Setting.vue', () => {
  it('should render correct contents', () => {
    const vm = new Vue({
      template: '<div><setting v-ref:content></setting></div>',
      components: { Setting },
    }).$mount();
    expect(vm.$el.querySelector('h1').textContent).to.contain('setting page');
    expect(vm.$refs.content.$refs.head.title).to.contain('setting');
  });
});
