require('./bootstrap');
import VueRouter from 'vue-router'

import Admin from './components/admin/Admin.vue'
import routes from './components/admin/router.js'
import store from './components/admin/store';


import VueTimeago from 'vue-timeago'
import CKEditor from '@ckeditor/ckeditor5-vue';
// import "@fortawesome/fontawesome-free/css/all.min.css"

window.axios = require('axios');


window.Vue = require('vue');

export const eventBus = new Vue();


Vue.use( CKEditor );
require('./components/admin/store/sub')

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
    routes,
    base:'admin'
})

Vue.use(VueRouter)



new Vue({
    store,
    router,
    render: h => h(Admin)
}).$mount('#admin')

require('./sb-admin.min.js');
