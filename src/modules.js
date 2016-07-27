export default [
  {
    name: 'Group',
    module: require('lf-components/cell/group'),
  },
  {
    name: 'Cell',
    module: require('lf-components/cell/cell'),
  },
  {
    name: 'CellBody',
    module: require('lf-components/cell/cell-body'),
  },
  {
    name: 'CellHeader',
    module: require('lf-components/cell/cell-header'),
  },
  {
    name: 'CellFooter',
    module: require('lf-components/cell/cell-footer'),
  },
  {
    name: 'XRadio',
    module: require('lf-components/form/radio'),
  },
  {
    name: 'XSelect',
    module: require('lf-components/form/select'),
  },
  {
    name: 'XSwitch',
    module: require('lf-components/form/switch'),
  },
  {
    name: 'XInput',
    module: require('lf-components/form/input'),
  },
  {
    name: 'XTextarea',
    module: require('lf-components/form/textarea'),
  },
  {
    name: 'XLabel',
    module: require('lf-components/label'),
  },
  {
    name: 'Checklist',
    module: require('vux-components/checklist'),
  },
  {
    name: 'XButton',
    module: require('vux-components/x-button'),
  },
  {
    name: 'Flexbox',
    module: require('vux-components/flexbox'),
  },
  {
    name: 'Icon',
    module: require('vux-components/icon'),
  },
  {
    name: 'Panel',
    module: require('vux-components/panel'),
  },
  {
    name: 'Tab',
    module: require('vux-components/tab'),
  },
  {
    name: 'XImg',
    module: require('vux-components/x-img'),
  },
  {
    name: 'Card',
    module: require('vux-components/card'),
  },
  {
    name: 'Actionsheet',
    module: (resolve) => {
      require(['vux-components/actionsheet'], resolve);
    },
  },
  {
    name: 'Spinner',
    module: (resolve) => {
      require(['vux-components/spinner'], resolve);
    },
  },
  {
    name: 'Confirm',
    module: (resolve) => {
      require(['vux-components/confirm'], resolve);
    },
  },
  {
    name: 'Dialog',
    module: (resolve) => {
      require(['vux-components/dialog'], resolve);
    },
  },
  {
    name: 'Loading',
    module: (resolve) => {
      require(['vux-components/loading'], resolve);
    },
  },
  {
    name: 'Alert',
    module: (resolve) => {
      require(['vux-components/alert'], resolve);
    },
  },
  {
    name: 'Datetime',
    module: (resolve) => {
      require(['vux-components/datetime'], resolve);
    },
  },
  {
    name: 'Toast',
    module: (resolve) => {
      require(['vux-components/toast'], resolve);
    },
  },
  {
    name: 'Address',
    module: (resolve) => {
      require(['vux-components/address'], resolve);
    },
  },
  {
    name: 'FIcon',
    module: (resolve) => {
      require(['vue-awesome'], resolve);
    },
  },
];
