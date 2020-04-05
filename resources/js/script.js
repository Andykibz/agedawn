require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
import Adawnage from './components/frontend/Adawnage.vue';
// import axios from 'axios'
import routes from './components/frontend/router.js';
import store from './components/frontend/store';

import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import CKEditor from '@ckeditor/ckeditor5-vue';
import GAuth from 'vue-google-oauth2'
import VueAwesomeSwiper from 'vue-awesome-swiper'
// import ZoomOnHover from "vue-zoom-on-hover";
// Vue.use(ZoomOnHover);

import 'swiper/css/swiper.css'

const gauthOption = {
  clientId: '948718702232-mr3fnqa6i2gndknegb82mgsreesv2onq.apps.googleusercontent.com',
  scope: 'profile email',
  prompt: 'select_account'
}
require('./components/frontend/store/sub')



Vue.use(GAuth, gauthOption)
Vue.use(CKEditor)
Vue.use(VueAwesomeSwiper)

library.add(fas,fab)
import 'aos/dist/aos.css'

import AOS from 'aos';
AOS.init({
    duration: 800,
    easing: 'slide',
    once: true
});


Vue.component('font-awesome-icon', FontAwesomeIcon)

// axios.defaults.baseURL = 'http://127.0.0.1:8000/api'

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};

const router = new VueRouter({
    mode: 'history',
    routes
})

Vue.use(VueRouter)

store.dispatch('auth/attempt',localStorage.getItem('token'))
.then(()=>{
    new Vue({
        store,
        router,
        render: h => h(Adawnage)
    }).$mount('#adawnage')
})


require('./main.js');