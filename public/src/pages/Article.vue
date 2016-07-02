<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="article">
    <main class="main">
      <group>
        <p>
          为了给您提供更好的服务，希望您能抽出几分钟时间，
          将您的感受和建议告诉我们，我们非常重视每位用户的宝贵意见，
          期待您的参与！现在我们就马上开始吧！
        </p>
      </group>
      <group title="1. 你最喜欢的运动项目" >
        <radio :options="options" :value.sync="radioValue" fill-mode fill-label="其他" fill-placeholder="填写其他选项"></radio>
      </group>
      <group>
        <checklist title="2.请选择你的爱好" :options="options" :value.sync="selectedItems"></checklist>
      </group>
      <group  title="3.你喜欢的运动项目">
        <selector placeholder="请选择" :options="options" :value.sync="selectorValue"></selector>
      </group>
    </main>
  </div>
</template>

<style lang="scss">
@import "../assets/styles/pages/article.scss";
</style>

<script>
import NavigationBar from 'components/NavigationBar';
import VueHelmet from 'vue-helmet';
import Checklist from 'vux-components/checklist';
import Radio from 'vux-components/radio';
import Group from 'vux-components/group';
import Selector from 'vux-components/selector';

export default {
  data() {
    return {
      title: `article-${this.$route.params.id}`,
      options: [{ key: '1', value: '篮球' }, { key: '2', value: '足球' }, { key: '3', value: '排球' }],
      selectedItems: [],
      selectorValue: '',
      radioValue: '1',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
    Checklist,
    Radio,
    Group,
    Selector,
  },
};
</script>
