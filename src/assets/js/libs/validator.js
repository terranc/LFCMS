import 'form-serializer';
import 'nice-validator/dist/local/zh-CN';
import 'weui.js';
$.validator.config({
  debug: false,
  timely: 1,
  rules: {
    mobile: [/^1[3-9]\d{9}$/, '请填写有效的手机号'],
    chinese: [/^[\u0391-\uFFE5]+$/, '请填写中文字符'],
  },
  stopOnError: false,
  focusInvalid: true,
  showOk: false,
  ignore: ':hidden',
  target: [],
  display: (elem) => {
    return $(elem).closest('.weui_cell').children('.weui_cell_hd').text();
  },
  validation(el, result) {
    if (result.isValid) {
      this.options.vm.$broadcast('toggle-cell-warn', false, el.name);
    } else {
      this.options.vm.$broadcast('toggle-cell-warn', true, el.name);
    }
  },
  invalid(form, errors) {
    $.weui.topTips(errors[0]);
  },
});
