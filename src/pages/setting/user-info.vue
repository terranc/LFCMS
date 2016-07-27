<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="account">
    <!-- <validator name="info"> -->
      <form class="main" @submit="onSubmit" novalidate>
       
        <group>
          <div class="weui_cell">
            <div class="weui_cell_hd">
              <label class="weui_label">昵称</label>
            </div>
            <div class="weui_cell_bd weui_cell_primary">
              <input class="weui_input" type="text" v-validate:nickname="{
                    required: { rule: true, message: '填写您的昵称' }
                  }" maxlength="12" :value.sync="nickname">
            </div>
            <div class="weui_cell_ft">
              <i class="weui_icon_warn" v-if="$info.nickname.invalid"></i>
            </div>
          </div>
        </group>

        <group>
          <div class="weui_cells_title">联系方式</div>
          <div class="weui_cell">
            <div class="weui_cell_hd">
              <label class="weui_label">邮箱</label>
            </div>
            <div class="weui_cell_bd weui_cell_primary">
              <input class="weui_input" type="text" v-validate:email="['email', 'required']" :value.sync="email">
            </div>
            <div class="weui_cell_ft">
              <i class="weui_icon_warn" v-if="$info.email.invalid"></i>
            </div>
          </div>
          <div class="weui_cell">
            <div class="weui_cell_hd">
              <label class="weui_label">手机号码</label>
            </div>
            <div class="weui_cell_bd weui_cell_primary">
              <input class="weui_input" type="text" v-validate:cellphone="['cellphone', 'required']" maxlength="11" :value.sync="cellphone">
            </div>
            <div class="weui_cell_ft">
              <i class="weui_icon_warn" v-if="$info.cellphone.invalid"></i>
            </div>
          </div>
        </group>

        <group>
          <div class="weui_cells_title">工作信息</div>
          <div class="weui_cells"> 
            <div class="weui_cell weui_select_after weui_cell_select">
              <div class="weui_cell_hd">
                <label class="weui_label">职业</label> 
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <select class="weui_select" v-validate:occupation="{
                    required: { rule: true, message: '请填选您的职业' }
                  }">
                  <option value="">请选择职业</option>
                  <option value="student">学生</option>
                  <option value="developer">开发</option> 
                </select> 
              </div>
            </div>
          </div>
        </group>
       
        <group>
          <div class="weui_cells_title">性别</div>
          <div class="weui_cells">
            <div class="weui_cells_radio">
              <label class="weui_cell weui_cell_radio weui_check_label">
                <div class="weui_cell_bd weui_cell_primary">
                  <p>男</p>
                </div>
                <div class="weui_cell_ft">
                  <input type="radio" class="weui_check" value="male" name="gender" v-validate:gender="{
                    required: { rule: true, message: '请选择性别' }
                  }">
                  <span class="weui_icon_checked"></span> 
                </div> 
              </label>
              <label class="weui_cell weui_cell_radio weui_check_label">
                <div class="weui_cell_bd weui_cell_primary">
                  <p>女</p>
                </div>
                <div class="weui_cell_ft">
                  <input type="radio" class="weui_check" value="female" name="gender" v-validate:gender>
                  <span class="weui_icon_checked"></span>
                </div>
              </label>
            </div>
          </div>
        </group>

        <group>
          <div class="weui_cells_title">请选择你的爱好</div>
          <div class="weui_cells weui_cells_checkbox">
            <label class="weui_cell weui_check_label">
              <div class="weui_cell_hd">
                <input type="checkbox" class="weui_check" value="篮球" name="hobbies" v-validate:hobbies="{
                    required: { rule: true, message: '请选择爱好' }
                  }">
                <i class="weui_icon_checked"></i>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <p>篮球</p>
              </div>
            </label>
            <label class="weui_cell weui_check_label">
              <div class="weui_cell_hd">
                <input type="checkbox" class="weui_check" value="足球" name="hobbies" v-validate:hobbies>
                <i class="weui_icon_checked"></i>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <p>足球</p>
              </div>
            </label>
            <label class="weui_cell weui_check_label">
              <div class="weui_cell_hd">
                <input type="checkbox" class="weui_check" value="羽毛球" name="hobbies" v-validate:hobbies>
                <i class="weui_icon_checked"></i>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <p>羽毛球</p>
              </div>
            </label>
            <label class="weui_cell weui_check_label">
              <div class="weui_cell_hd">
                <input type="checkbox" class="weui_check" value="打飞机" name="hobbies" v-validate:hobbies>
                <i class="weui_icon_checked"></i>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <p>打飞机</p>
              </div>
            </label>
          </div>
        </group>
        <group title="Default">
          <switch title="default setting"></switch>
          <switch title="default true" :value="true"></switch>
        </group>

        <div class="weui_btn_area">
          <button class="weui_btn weui_btn_primary"> 保存 </button>
        </div>
        <Toptips v-ref:toptips>{{ errorInfo }}</Toptips>
      </form>
    <!-- </validator> -->
  </div>
</template>

<style lang="scss">
</style>

<script>
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';
import Switch from 'vux-components/switch';
// import Validator from 'vue-validator';
import Toptips from 'lf-components/toptips';

export default {
  head: {
    title: {
      inner: '用户信息设置',
    },
  },
  data() {
    return {
      errorInfo: '',
      email: 'weijie@lookfeel.co',
      nickname: 'moucai',
      cellphone: '13333333333',
    };
  },
  components: {
    Group,
    Cell,
    Switch,
    // Validator,
    Toptips,
  },
  methods: {
    onSubmit(e) {
      for (const error of this.$info.errors) {
        this.$refs.toptips.show = true;
        this.errorInfo = error.message;
        e.preventDefault();
        return;
      }
      this.$refs.toptips.show = false;
      this.errorInfo = '';      
    },
  },
};
</script>

