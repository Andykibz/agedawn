require('./bootstrap');
import VueRouter from 'vue-router'

import Admin from './components/Admin/Admin.vue'
import routes from './components/Admin/router.js'
import store from './components/Admin/store';


import VueTimeago from 'vue-timeago'
import CKEditor from '@ckeditor/ckeditor5-vue';

window.axios = require('axios');


window.Vue = require('vue');

export const eventBus = new Vue();


Vue.use( CKEditor );

Vue.use(VueTimeago, {
    name: 'Timeago', // Component name, `Timeago` by default
    locale: 'en-UK', // Default locale
    // We use `date-fns` under the hood
    // So you can use all locales from it
    locales: {
        'zh-CN': require('date-fns/locale/zh_cn'),
        ja: require('date-fns/locale/ja')
    }
  })



const router = new VueRouter({
    mode: 'history',
    routes
})

Vue.use(VueRouter)



new Vue({
    store,
    router,
    render: h => h(Admin)
}).$mount('#admin')

require('./sb-admin.min.js');
