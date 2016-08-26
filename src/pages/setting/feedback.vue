<template>
  <div class="wrapper" id="index">
    <content-wrapper>
      <form novalidate>
        <group>
          <cell>
            <x-label slot="header" name="name">姓名</x-label>
            <x-input slot="body" name="username" class="feedback_username"></x-input>
          </cell>
          <cell>
            <x-label slot="header">手机号</x-label>
            <x-input slot="body" name="mobile" type="mobile" class="feedback_mobile"></x-input>
          </cell>
        </group>

        <group>
          <uploader :id.sync="uploaderData.id" :title.sync="uploaderData.title" :on-change="uploaderData.onChange" :on-success="uploaderData.onSuccess" :on-error="uploaderData.onError" url="http://upload.qiniu.com/" :data.sync="data"></uploader>
        </group>

        <group title="填写反馈 &amp; 建议内容">
          <x-textarea :value.sync="textareaVal" :max="255" :show-conunter="true" placeholder="不少于10个字" class="feedback_textarea"></x-textarea>
        </group>

      </form>
      <div class="weui_btn_area">
        <x-button type="primary" @click="submitForm" id="uploadFileBtn">提交</x-button>
      </div>
    </content-wrapper>
    <loading :show.sync="isLoading" :text.sync="loadingText"></loading>
    <alert :show.sync="isAlert" title="提示" button-text="确认">
      <p style="text-align:center;">信息填写不符合要求，请填写正确！</p>
    </alert>
  </div>
</template>

<style>
  .feedback_textarea textarea {
    height: 100px;
    font-size: 16px;
  }
</style>

<script>
import ContentWrapper from 'lf-components/content-wrapper';
import 'src/validator';
import Uploader from 'lf-components/form/uploader';
import XButton from 'vux-components/x-button';
import Loading from 'vux-components/loading';
import Alert from 'vux-components/alert';
import XTextarea from 'vux-components/x-textarea';

export default {
  ready () {
    $('form').validator({
      fields: {
        username: 'required;realname',
        mobile: 'required;mobile',
        prosessData: false,
      },
      vm: this,
    });
  },
  head: {
    title: {
      inner: '提交 & 反馈',
    },
  },
  route: {
    data() {
      this.data.token = 'AkN_SzRsi6WraKm2Klh0X_qQop9HLqKWYyIi36Li:bY1s5zQY_jrt0PwGq8oAAELSyRQ=:eyJzY29wZSI6InBodC1pbWciLCJkZWFkbGluZSI6Mzc0NzIxMDM4NzZ9';
      // Get Token
      // var tempToken = '';
      // $.ajax({
      //   url: 'http://192.168.2.219/api/uploadToken',
      //   type: 'POST',
      //   dataType: 'json',
      //   async: false,
      //   success: function(r) {
      //     var trimString = r.responseText.resString.trim();
      //     var startIndex = trimString.indexOf('{');
      //     var endIndex = trimString.lastIndexOf('}');
      //     var jsonData = $.parseJSON(trimString.substring(startIndex, endIndex + 1));
      //     tempToken = jsonData.uptoken;
      //   },
      // });
      // this.data.token = tempToken;
      // console.log(this.data.token);
    },
  },
  data() {
    return {
      data: {
        keyList: [],
      },
      isAlert: false,
      isLoading: false,
      loadingText: '图片上传中',
      textareaVal: '',
      uploaderData: {
        title: '图片上传',
        id: 'imgUploader',
        onChange: (file) => {
          console.log(this.data);
          this.isLoading = true;
        },
        onSuccess: (res) => {
          this.data.keyList.push(res.key);
          this.isLoading = false;
        },
        onError: (res) => {
          this.isLoading = false;
          this.$route.router.go('../../../fail');
          console.log('error');
        },
      },
    };
  },
  watch: {
    'textareaVal': function (newVal, oldVal) {
      if (newVal.trim() !== '') {
        console.log(this.isDisabled);
        this.isDisabled = false;
      } else {
        this.disabled = true;
      }
    },
  },
  methods: {
    submitForm: function () {
      console.log(this.data);
      const uploadData = new FormData();
      // get key  key|key|key
      var key = '';
      for (var i = 0; i < this.data.keyList.length; i++) {
        key += this.data.keyList[i];
        if ((i + 1) !== this.data.keyList.length) {
          key += '|';
        }
      }
      console.log(key);
      uploadData.append('image', key);
      // get phoneNumber & Name & Textarea
      var user = $('.feedback_username')[0].value;
      var phone = $('.feedback_mobile')[0].value;
      var content = $('.feedback_textarea textarea')[0].value.trim();
      uploadData.append('name', name);
      uploadData.append('phone', phone);
      uploadData.append('content', content);

      var baseURL = 'http://192.168.2.219/api/feedback/send?';
      var finalURL = baseURL + 'phone=' + phone + '&name=' + user + '&content=' + content + '&image=' + key;
      console.log(finalURL);
      console.log(key);
      var encodeURL = encodeURI(finalURL);
      console.log(encodeURL);

      const vm = this;
      var isMobile = phone.search(/^((13[0-9])|(15[0-9])|(18[0-9])|(17[0-9]))\d{8}$/);
      var isUserName = user.search(/^[\u0391-\uFFE5]+$/);
      if (isMobile !== -1 && isUserName !== -1 && content.length >= 10) {
        console.log(this);
        console.log(this.data.keyList);
        // this.isLoading = true;
        $.ajax({
          url: encodeURL,
          type: 'POST',
          data: uploadData,
          processData: false,
          beforeSend: function () {
            vm.isLoading = true;
            vm.loadingText = '提交中';
          },
          success: function () {
            // TODO: go to sucess page
            console.log('submit success');
            vm.isLoading = false;
            vm.$route.router.go('../../../success');
            // setTimeout(function() {
            //   vm.$route.router.go('index');
            // }, 3000);
          },
          error: function () {
            vm.$route.router.go('../../../fail');
          },
        });
      } else {
        vm.isAlert = true;
        // TODO: 提示信息不全
        // console.log('error');
        // console.log(this);
        // vm.$route.router.replace('../../../fail');
        // setTimeout(function() {
        //   vm.$route.router.go('./setting/feedback');
        // }, 3000);
      }
    },
  },

  components: {
    ContentWrapper,
    XTextarea,
    Uploader,
    XButton,
    Loading,
    Alert,
  },
};
</script>

