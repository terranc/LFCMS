<template>
  <vue-helmet :title="title" v-ref:head></vue-helmet>
  <div  class="wrapper" id="index">
    <validator name="form">
      <form class="main main-footer" @submit="onSubmit" novalidate>
        <cells-title>这是分组</cells-title>
        <cells :access="true">
          <cell>
            <cell-header>
              <icon name="home" scale="1.25"></icon>
            </cell-header>
            <cell-body>账户</cell-body>
            <cell-footer>LookFeel</cell-footer>
          </cell>
        </cells>
        <cells-tips>这是tips</cells-tips>
        <cells>
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
            <cell-header class="weui_cell_primary">
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
          <cell :select="true">
            <cell-header>
              <x-label>数组下拉</x-label>
            </cell-header>
            <cell-body>
              <x-select :options="['a','b','c','d']"></x-select>
            </cell-body>
          </cell>
          <cell :select="true">
            <cell-header>
              <x-label>JSON下拉</x-label>
            </cell-header>
            <cell-body>
              <x-select :options="{'a':1,'b':2}"></x-select>
            </cell-body>
          </cell>
          <cell :select="true" select-pos="before">
            <cell-header>
              <x-select :options="{'+86':1, '+80': 2, '+84': 3, '+87': 4}"></x-select>
            </cell-header>
            <cell-body>
              <x-input type="tel" placeholder="请输入手机号码" v-validate:cellphone="['cellphone']"></x-input>
            </cell-body>
          </cell>
        </cells>
        <cells :radio="true">
          <cell :radio="true">
            <cell-header>
              <icon name="home" scale="1.25"></icon>
            </cell-header>
            <cell-body class="weui_cell_primary">
              啊实打实的
            </cell-body>
            <cell-footer>
              <x-radio name="aa[]" value="1"></x-radio>
            </cell-footer>
          </cell>
          <cell :radio="true">
            <cell-header>
              <icon name="home" scale="1.25"></icon>
            </cell-header>
            <cell-body class="weui_cell_primary">
              啊实打实的12
            </cell-body>
            <cell-footer>
              <x-radio name="aa[]" value="2"></x-radio>
            </cell-footer>
          </cell>
        </cells>
        <cells :checkbox="true">
          <cell :checkbox="true">
            <cell-header>
              <icon name="home" scale="1.25"></icon>
            </cell-header>
            <cell-body class="weui_cell_primary">
              啊实打实的
            </cell-body>
            <cell-footer>
              <x-checkbox name="bb[]" value="1"></x-checkbox>
            </cell-footer>
          </cell>
          <cell :checkbox="true">
            <cell-header>
              <icon name="home" scale="1.25"></icon>
            </cell-header>
            <cell-body class="weui_cell_primary">
              啊实打实的12
            </cell-body>
            <cell-footer>
              <x-checkbox name="bb[]" value="2"></x-checkbox>
            </cell-footer>
          </cell>
        </cells>
        <cells :checkbox="true">
          <cell :checkbox="true">
            <cell-header>
              <x-checkbox name="bb[]" value="1"></x-checkbox>
            </cell-header>
            <cell-body class="weui_cell_primary">
              啊实打实的
            </cell-body>
          </cell>
          <cell :checkbox="true">
            <cell-header>
              <x-checkbox name="bb[]" value="2"></x-checkbox>
            </cell-header>
            <cell-body class="weui_cell_primary">
              啊实打实的12
            </cell-body>
          </cell>
        </cells>
        <div class="weui_btn_area">
          <button class="weui_btn weui_btn_primary"> 保存 </button>
        </div>
      </form>
    </validator>
  </div>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import { Cells, Cell, CellHeader, CellFooter, CellBody, CellsTitle, CellsTips } from 'vux-extension/cell';
import { xInput, xSwitch, xTextarea, xRadio, xCheckbox, xSelect } from 'vux-extension/form';
import Validator from 'vue-validator';
import xLabel from 'vux-extension/label/label';
import Icon from 'vue-awesome';
import { LFTabbar } from '../vuex/actions';

export default {
  ready() {
    LFTabbar.show();
  },
  data() {
    return {};
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
    xLabel,
  },
  methods: {
    onSubmit(e) {
      e.preventDefault();
    },
  },
};
</script>

