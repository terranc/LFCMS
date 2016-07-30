<template>
  <vue-helmet :title="title" v-ref:head></vue-helmet>
  <div  class="wrapper" id="index">
    <main class="main main-footer">
      <validator name="signup">
        <form novalidate>
          <group>
            <div class="weui_cell">
              <div class="weui_cell_hd">
                <label class="weui_label">邮箱地址</label>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <input type="text" class="weui_input" v-validate:email="['required']">
              </div>
            </div>
          </group>
          <group>
            <div class="weui_cell">
              <div class="weui_cell_hd">
                <label class="weui_label">密码</label>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <input type="password" v-validate:password="['required']">
              </div>
            </div>
            <div class="weui_cell">
              <div class="weui_cell_hd">
                <label class="weui_label">确认密码</label>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <input type="password" v-validate:passwordAgain="['required']">
              </div>
            </div>
          </group>
          <group>
            <label>琴<input type="checkbox" v-validate:hobbies="['required']" value="琴"></label>
            <label>棋<input type="checkbox" v-validate:hobbies="['required']" value="棋"></label>
            <label>书<input type="checkbox" v-validate:hobbies="['required']" value="书"></label>
            <label>画<input type="checkbox" v-validate:hobbies="['required']" value="画"></label>
          </group>
          <group title="哈市的">
            <x-input title="邮箱" name="email" placeholder="请输入邮箱地址" is-type="email"></x-input>
            <select v-validate:occupation="['required']">
              <option value="">请选择</option>
              <option value="学生">学生</option>
              <option value="设计师">设计师</option>
              <option value="产品经理">产品经理</option>
              <option value="研发">研发</option>
            </select>
          </group>
          <group>
            <label>男<input type="radio" v-validate:gender="['required']" value="男"></label>
            <label>女<input type="radio" v-validate:gender="['required']" value="女"></label>
          </group>
          <div class="weui_btn_area">
            <x-button type="primary">确定</x-button>
          </div>
        </form>
      </validator>    
    </main>
  </div>
  <Toptips v-ref:toptips>这是提示</Toptips>
</template>

<style lang="scss">
</style>

<script>
import Validator from 'vue-validator';
import Group from 'vux-components/group';
import XInput from 'vux-components/x-input';
import Checklist from 'vux-components/checklist';
import XButton from 'vux-components/x-button';
import Radio from 'vux-components/radio';
import Selector from 'vux-components/selector';
import Action from '../vuex/actions';
import Toptips from 'vux-extension/toptips';

export default {
  ready() {
    this.$refs.toptips.show = true;
  },
  head: {
    title: {
      inner: '注册',
    },
  },
  data() {
    return {
      gender: ['男', '女'],
      occupation: ['学生', '设计师', '产品经理', '研发'],
      hobbies: ['琴', '棋', '书', '画'],
      occupationValue: '',
      genderValue: '',
      hobbyValues: [],
    };
  },
  components: {
    Group,
    XInput,
    Checklist,
    Radio,
    Selector,
    XButton,
    Validator,
    Toptips,
  },
};
</script>

