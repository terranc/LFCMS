<template>
  <vue-helmet :title="title" v-ref:head></vue-helmet>
  <div class="wrapper" id="index">
    <validator name="form">
      <form class="main main-footer" @submit="onSubmit" novalidate>
        <cells-title>带图标、说明的列表项</cells-title>
        <cells>
          <cell>
            <icon name="home" scale="1.25" slot="header"></icon>
            <slot slot="body">标题文字</slot>
            <slot slot="footer">说明文字</slot>
          </cell>
          <cell href="http://baidu.com">
            <slot slot="body">百度</slot>
            <slot slot="footer">链接</slot>
          </cell>
          <cell>
            <icon name="home" scale="1.25" slot="header"></icon>
            <cell-body>自定义body</cell-body>
            <cell-footer>自定义footer</cell-footer>
          </cell>
        </cells>
        <cells-title>文本框</cells-title>
        <cells>
          <cell>
            <x-label slot="header">账号</x-label>
            <x-input slot="body" name="username" placeholder="输入登录账号" :warn="true"></x-input>
          </cell>
          <cell>
            <x-label slot="header">密码</x-label>
            <x-input slot="body" name="password" type="password" placeholder="输入6~12位登录密码"></x-input>
          </cell>
          <cell>
            <x-label slot="header">确认密码</x-label>
            <x-input slot="body" name="repassword" type="password" placeholder="再次输入以上密码"></x-input>
          </cell>
          <cell vcode="http://adcentury.github.io/vue-weui/vcode.jpg?785e6badfde02d6b7c565e18cf56cca1">
            <x-label slot="header" width="4">验证码</x-label>
            <x-input slot="body" name="vcode"></x-input>
          </cell>
        </cells>
        <cells-title>下拉框</cells-title>
        <cells>
          <cell>
            <x-label slot="header">Array</x-label>
            <x-select :options="['a','b','c']" slot="body"></x-select>
          </cell>
          <cell>
            <x-label slot="header">JSON</x-label>
            <x-select :options="{'a':1,'b':2,'c':3}" slot="body"></x-select>
          </cell>
        </cells>
        <cells-title>单选</cells-title>
        <cells>
          <cell>
            <icon name="home" scale="1.25" slot="header"></icon>
            <slot slot="body">选项1</slot>
            <x-radio name="radio[]" slot="footer" value="1"></x-radio>
          </cell>
          <cell>
            <slot slot="body">选项2</slot>
            <x-radio name="radio[]" slot="footer" value="2"></x-radio>
          </cell>
        </cells>
        <cells-title>多选框</cells-title>
        <cells>
          <cell>
            <x-checkbox name="checkbox[]" slot="header" value="1"></x-checkbox>
            <slot slot="body">选项1</slot>
          </cell>
          <cell>
            <x-checkbox name="checkbox[]" slot="header" value="2"></x-checkbox>
            <slot slot="body">选项2</slot>
          </cell>
          <cell>
            <x-checkbox name="checkbox[]" slot="header" value="3"></x-checkbox>
            <slot slot="body">选项3</slot>
          </cell>
        </cells>
        <cells-title>开关</cells-title>
        <cells>
          <cell>
            <icon name="home" scale="1.25" slot="header"></icon>
            <slot slot="body">选项1</slot>
            <x-switch name="switch" slot="footer" value="1"></x-switch>
          </cell>
          <cell>
            <slot slot="body">选项1</slot>
            <x-switch name="switch" slot="footer" value="1"></x-switch>
          </cell>
          <cell>
            <x-textarea placeholder="请输入提示文字.."></x-textarea>
          </cell>
        </cells>
        <cells-title>多行文本</cells-title>
        <cells>
          <cell>
            <x-textarea placeholder="请输入提示文字.."></x-textarea>
          </cell>
        </cells>
        <cells-tips style="text-align:center">注：最多1000字</cells-tips>
      </form>
    </validator>
  </div>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import { 
  Cells,
  Cell,
  CellHeader,
  CellFooter,
  CellBody,
  CellsTitle,
  CellsTips,
} from 'vux-extension/cell';
import { 
  xInput,
  xSwitch,
  xTextarea,
  xRadio,
  xCheckbox,
  xSelect,
  xUploader,
} from 'vux-extension/form';
import Validator from 'vue-validator';
import xLabel from 'vux-extension/label/label';
import Icon from 'vue-awesome';
import { LFTabbar } from '../vuex/actions';

export default {
  ready() {
    LFTabbar.show();
  },
  methods: {
    handlerChange: (file) => {
      $.weui.alert(file.name);
    },
    onSubmit(e) {
      e.preventDefault();
    },
  },
  components: {
    VueHelmet,
    Validator,
    Icon,
    Cells,
    Cell,
    CellHeader,
    CellFooter,
    CellBody,
    CellsTitle,
    CellsTips,
    xInput,
    xSwitch,
    xTextarea,
    xRadio,
    xCheckbox,
    xSelect,
    xUploader,
    xLabel,
  },
};
</script>

