<template>
  <vue-helmet :title="title" v-ref:head></vue-helmet>
  <div class="wrapper" id="index">
    <validator name="form">
      <form class="main main-footer" @submit="submit" novalidate>
        <cells title="带图标、说明的列表项">
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
        <cells title="文本框">
          <cell>
            <x-label slot="header">账号</x-label>
            <x-input slot="body" name="username" placeholder="输入登录账号"></x-input>
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
            <x-label slot="header">验证码</x-label>
            <x-input slot="body" name="vcode"></x-input>
          </cell>
        </cells>
        <cells title="下拉框">
          <cell>
            <x-label slot="header">Array</x-label>
            <x-select :options="['a','b','c']" slot="body"></x-select>
          </cell>
          <cell>
            <x-label slot="header">JSON</x-label>
            <x-select :options="{'a':1,'b':2,'c':3}" slot="body"></x-select>
          </cell>
        </cells>
        <cells tips="这是tips">
          <cell>
            <cell-header>
              <x-label>Email</x-label>
            </cell-header>
            <cell-body>
              <x-input 
                type="text" 
                placeholder="请输入 email " 
                maxlength="20" 
                v-validate:email="['email']" 
                initial="off"
                detect-change="off">
              </x-input>
            </cell-body>
            <cell-footer>
              <i class="weui_icon_warn" v-if="$form.email.invalid"></i>
            </cell-footer>
          </cell>
          <cell :switch="true">
            <cell-header>
              啊实打实的
            </cell-header>
            <cell-footer>
              <x-switch value="1"></x-switch>
            </cell-footer>
          </cell>
          <cell>
            <cell-body>
              <x-textarea placeholder="多行输入框" maxlength="5"></x-textarea>
            </cell-body>
          </cell>
          <cell>
            <cell-header>
              <x-label>数组下拉</x-label>
            </cell-header>
            <cell-body>
              <x-select :options="['a','b','c','d']"></x-select>
            </cell-body>
          </cell>
          <cell>
            <cell-header>
              <x-label>JSON下拉</x-label>
            </cell-header>
            <cell-body>
              <x-select :options="{'a':1,'b':2}"></x-select>
            </cell-body>
          </cell>
          <cell select-pos="before">
            <cell-header>
              <x-select :options="{'+86':1, '+80': 2, '+84': 3, '+87': 4}"></x-select>
            </cell-header>
            <cell-body>
              <x-input type="tel" placeholder="请输入手机号码" v-validate:cellphone="['cellphone']"></x-input>
            </cell-body>
          </cell>
        </cells>
        <cells :radio="true">
          <cell>
            <cell-header>
              <icon name="home" scale="1.25"></icon>
            </cell-header>
            <cell-body>
              啊实打实的
            </cell-body>
            <cell-footer>
              <x-radio name="aa[]" value="1"></x-radio>
            </cell-footer>
          </cell>
          <cell>
            <cell-header>
              <icon name="home" scale="1.25"></icon>
            </cell-header>
            <cell-body>
              啊实打实的12
            </cell-body>
            <cell-footer>
              <x-radio name="aa[]" value="2"></x-radio>
            </cell-footer>
          </cell>
        </cells>
        <cells :checkbox="true">
          <cell>
            <cell-header>
              <icon name="home" scale="1.25"></icon>
            </cell-header>
            <cell-body>
              啊实打实的
            </cell-body>
            <cell-footer>
              <x-checkbox name="bb[]" value="1"></x-checkbox>
            </cell-footer>
          </cell>
          <cell>
            <cell-header>
              <icon name="home" scale="1.25"></icon>
            </cell-header>
            <cell-body>
              啊实打实的12
            </cell-body>
            <cell-footer>
              <x-checkbox name="bb[]" value="2"></x-checkbox>
            </cell-footer>
          </cell>
        </cells>
        <cells :checkbox="true">
          <cell>
            <cell-header>
              <x-checkbox name="bb[]" value="1"></x-checkbox>
            </cell-header>
            <cell-body>
              啊实打实的
            </cell-body>
          </cell>
          <cell>
            <cell-header>
              <x-checkbox name="bb[]" value="2"></x-checkbox>
            </cell-header>
            <cell-body>
              啊实打实的12
            </cell-body>
          </cell>
        </cells>
        <div class="weui_btn_area">
          <x-button type="primary">提交</x-button>
        </div>
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
import { XButton } from 'vux';
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
    submit(e) {
      console.log($('[name=username]', e.target).closest('.weui_cell').addClass('weui_cell_warn'));
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
    xInput,
    xSwitch,
    xTextarea,
    xRadio,
    xCheckbox,
    xSelect,
    xUploader,
    xLabel,
    XButton,
  },
};
</script>

