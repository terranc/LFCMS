<template>
  <vue-helmet :title="title" v-ref:head></vue-helmet>
  <div  class="wrapper" id="index">
    <main class="main main-footer">
      <cells-title>这是分组</cells-title>
      <cells :access="true">
        <cell>
          <cell-header>
            <icon name="home" scale="1.25"></icon>
          </cell-header>
          <cell-body>撒旦</cell-body>
          <cell-footer>这是Footer</cell-footer>
        </cell>
      </cells>
      <cells-tips>这是tips</cells-tips>
      <cells :form="true">
        <cell>
          <cell-header>
            <x-label>啊实打实的</x-label>
          </cell-header>
          <cell-body>
            <x-input type="tel" placeholder="请输入qq号" value="爱上大飒飒的"></x-input>
          </cell-body>
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
            <x-select :options="{'+86':1, 
'+80': 2, 
'+84': 3, 
'+87': 4}"></x-select>
          </cell-header>
          <cell-body>
            <x-input type="tel" placeholder="请输入号码"></x-input>
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
      <cells :form="true">
        <cell>
          <cell-body>
            <x-uploader title="合适的话是" v-bind:on-change="handlerChange"></x-uploader>
          </cell-body>
        </cell>
        <cell>
          <cell-body>
            <x-uploader title="合适的话是2" v-bind:on-change="handlerChange"></x-uploader>
          </cell-body>
        </cell>
      </cells>
    </main>
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
import { xInput, 
xSwitch, 
xTextarea, 
xRadio, 
xCheckbox, 
xSelect, 
xUploader,
} from 'vux-extension/form';
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
  },
  components: {
    VueHelmet,
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

