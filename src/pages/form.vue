<template>
  <div class="wrapper" id="index">
    <content-wrapper>
      <form novalidate>
        <x-group title="列表">
          <x-cell>
            <x-icon slot="header">face</x-icon>
            <slot slot="body">安师大</slot>
          </x-cell>
          <cell title="vux列表"></cell>
        </x-group>
        <x-group title="还是">
          <x-cell>
            <x-label slot="header" size="5">
              账号
            </x-label>
            <x-input slot="body" name="username"></x-input>
          </x-cell>
          <x-cell>
            <x-label slot="header" size="5">密码</x-label>
            <x-input slot="body" name="password" type="password"></x-input>
          </x-cell>
          <x-cell>
            <cell-header>
              <x-label size="5">确认密码</x-label>
            </cell-header>
            <cell-body>
              <x-input name="repassword" type="password"></x-input>
            </cell-body>
          </x-cell>
          <x-cell>
            <cell-body>
              <uploader id="uploader"></uploader>
            </cell-body>
          </x-cell>
        </x-group>
        <x-group title="下拉框">
          <x-cell>
            <x-label slot="header">数组</x-label>
            <x-select :options="['a','b','c']" slot="body"></x-select>
          </x-cell>
          <x-cell>
            <x-label slot="header">对象</x-label>
            <x-select :options="{'a':1,'b':2,'c':3}" slot="body"></x-select>
          </x-cell>
          <x-cell select-pos="before">
            <cell-header>
              <x-select :options="{'+86':1, '+80': 2, '+84': 3, '+87': 4}"></x-select>
            </cell-header>
            <cell-body>
              <x-input type="tel" placeholder="请输入手机号码" v-validate:cellphone="['cellphone']"></x-input>
            </cell-body>
          </x-cell>
        </x-group>
        <x-group title="单选">
          <x-cell>
            <slot slot="body">选项1</slot>
            <x-radio name="radio[]" value="1" slot="footer" :checked="true"></x-radio>
          </x-cell>
          <x-cell>
            <slot slot="body">选项2</slot>
            <x-radio name="radio[]" value="2" slot="footer"></x-radio>
          </x-cell>
        </x-group>
        <x-group title="多选框">
          <x-cell>
            <x-checkbox name="checkbox[]" value="1" slot="header"></x-checkbox>
            <slot slot="body">选项1</slot>
          </x-cell>
          <x-cell>
            <x-checkbox name="checkbox[]" value="2" slot="header" :checked="true"></x-checkbox>
            <slot slot="body">选项2</slot>
          </x-cell>
          <x-cell>
            <x-checkbox name="checkbox[]" value="3" slot="header"></x-checkbox>
            <slot slot="body">选项3</slot>
          </x-cell>
        </x-group>
        <x-group title="开关">
          <x-cell>
            <slot slot="body">选项1</slot>
            <x-switch name="switch" slot="footer" value="1"></x-switch>
          </x-cell>
          <x-cell>
            <slot slot="body">选项1</slot>
            <x-switch name="switch" slot="footer" value="1"></x-switch>
          </x-cell>
          <switch title="听筒模式"></switch>
        </x-group>
        <x-group title="多行文本框">
          <x-cell>
            <x-textarea placeholder="请输入提示文字.." rows="4"></x-textarea>
          </x-cell>
        </x-group>
        <div class="weui_btn_area">
          <x-button type="primary">提交</x-button>
        </div>
      </form>
    </content-wrapper>
  </div>
</template>

<style lang="scss">
</style>

<script>
import ContentWrapper from 'lf-components/content-wrapper';
import Uploader from 'lf-components/form/uploader';
import Switch from 'vux-components/switch';
import 'src/validator';

export default {
  ready() {
    $('form').validator({
      fields: {
        username: 'required;chinese',
        password: 'required',
        repassword: 'match(password)',
      },
      vm: this,
    });
  },
  head: {
    title: {
      inner: '表单demo',
    },
  },
  data() {
    return {
      username: '',
    };
  },
  created() {
    this.$on('toggle-cell-warn', (val, elname) => {

    });
  },
  methods: {
  },
  components: {
    ContentWrapper,
    Uploader,
    Switch,
    // Validator,
  },
};
</script>

