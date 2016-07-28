<template>
  <div class="wrapper" id="index">
    <content-wrapper>
      <form novalidate>
        <group title="还是">
          <cell>
            <x-label slot="header">账号</x-label>
            <x-input slot="body" name="username"></x-input>
          </cell>
          <cell>
            <x-label slot="header">密码</x-label>
            <x-input slot="body" name="password" type="password"></x-input>
          </cell>
          <cell>
            <cell-header>
              <x-label>确认密码</x-label>
            </cell-header>
            <cell-body>
              <x-input name="repassword" type="password"></x-input>
            </cell-body>
          </cell>
        </group>
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
    // Validator,
  },
};
</script>

