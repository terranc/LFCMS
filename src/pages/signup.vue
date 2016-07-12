<template>
  <vue-helmet :title="title" v-ref:head></vue-helmet>
  <div  class="wrapper" id="index">
    <main class="main main-footer">
      <validator name="signup">
        <form novalidate>
          <group>
            <input type="text" placeholder="邮箱地址" v-validate:email="['required']">
          </group>
          <group>
            <input type="password" placeholder="密码" v-validate:password="['required']">
            <input type="password" placeholder="重复密码" v-validate:passwordAgain="['required']">
          </group>
          <group>
            <label>琴<input type="checkbox" v-validate:hobbies="['required']" value="琴"></label>
            <label>棋<input type="checkbox" v-validate:hobbies="['required']" value="棋"></label>
            <label>书<input type="checkbox" v-validate:hobbies="['required']" value="书"></label>
            <label>画<input type="checkbox" v-validate:hobbies="['required']" value="画"></label>
          </group>
          <group>
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
          <group>
            <x-button type="primary" v-if="$signup.valid">确定</x-button>
          </group>
        </form>
      </validator>    
    </main>
  </div>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Validator from 'vue-validator';
import Group from 'vux-components/group';
import XInput from 'vux-components/x-input';
import Checklist from 'vux-components/checklist';
import XButton from 'vux-components/x-button';
import Radio from 'vux-components/radio';
import Selector from 'vux-components/selector';
import { LFTabbar } from '../vuex/actions';

export default {
  ready() {
    LFTabbar.show();
  },
  data() {
    return {
      title: 'signup',
      gender: ['男', '女'],
      occupation: ['学生', '设计师', '产品经理', '研发'],
      hobbies: ['琴', '棋', '书', '画'],
      occupationValue: '',
      genderValue: '',
      hobbyValues: [],
    };
  },
  components: {
    VueHelmet,
    Group,
    XInput,
    Checklist,
    Radio,
    Selector,
    XButton,
    Validator,
  },
};
</script>

