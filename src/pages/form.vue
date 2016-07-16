<template>
  <vue-helmet :title="title" v-ref:head></vue-helmet>
  <div  class="wrapper" id="index">
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
            <icon name="home" scale="1.25" slot="header"></icon>
            <slot slot="body">标题文字</slot>
            <slot slot="footer">说明文字</slot>
          </cell>
        </cells>
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

