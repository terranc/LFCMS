<template>
  <vue-helmet :title="title" v-ref:head></vue-helmet>
  <div class="wrapper" id="index">
    <content-wrapper>
      <form>
        <group title="cell">
          <cell title="带图标" value="footer">
            <icon name="home" scale="1.25" slot="icon"></icon>
          </cell>
          <cell title="百度链接" link="http://baidu.com"></cell>
          <cell title="返回设置" link="/setting"></cell>
        </group>
        <group title="文本框">
          <x-input title="账号" type="text" name="username" placeholder="" :min="3" :max="8"></x-input>
          <x-input title="密码" type="password" name="password" placeholder="" :min="6" :max="18"></x-input>
          <x-input title="确认密码" type="password" name="repassword" placeholder="" :min="6" :max="18"></x-input>
        </group>
        <group title="验证码">
          <x-input title="验证码" class="weui_vcode">
            <img slot="right" src="http://weui.github.io/weui/images/vcode.jpg">
          </x-input>
          <x-input title="发送验证码" class="weui_vcode" :show-clear="false">
            <x-button slot="right" type="primary">发送验证码</x-button>
          </x-input>
        </group>
      </form>
    </content-wrapper>
  </div>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Icon from 'vue-awesome';
import { Group, Cell, XInput, XButton } from 'vux';
import ContentWrapper from 'components/vux-extension/content-wrapper';

export default {
  ready() {
  },
  methods: {
  },
  components: {
    ContentWrapper,
    VueHelmet,
    Icon,
    XButton,
    Group,
    Cell,
    XInput,
  },
};
</script>

