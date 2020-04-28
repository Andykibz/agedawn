require('./bootstrap');

require('./main.js');



// window.Vue = require('vue');
import Vue from 'vue'


import VueRouter from 'vue-router';
import Adawnage from './components/frontend/Adawnage.vue';
// import axios from 'axios'
import routes from './components/frontend/router.js';
import store from './components/frontend/store';

import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import GAuth from 'vue-google-oauth2'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import ProductZoomer from 'vue-product-zoomer'
import VModal from 'vue-js-modal'
import AOS from 'aos';
import 'aos/dist/aos.css'
import VTooltip from 'v-tooltip'
import VueTimeago from 'vue-timeago'


import 'swiper/css/swiper.css'

const gauthOption = {
    clientId: '948718702232-mr3fnqa6i2gndknegb82mgsreesv2onq.apps.googleusercontent.com',
    scope: 'profile email',
    prompt: 'select_account'
}
require('./components/frontend/store/sub')


Vue.use(VueRouter)
Vue.use(GAuth, gauthOption)
Vue.use(VueAwesomeSwiper)
Vue.use(ProductZoomer)
Vue.use(VModal, { dialog:true, dynamic: true, injectModalsContainer: true })
Vue.use(VTooltip)
Vue.use(VueTimeago, {
    locale: 'en',
    locales: {
      'zh-CN': require('date-fns/locale/zh_cn')
    }
  })

library.add(fas,fab)

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


store.dispatch('auth/attempt',localStorage.getItem('token'))
.then(()=>{
    new Vue({
        store,
        router,
        render: h => h(Adawnage)
    }).$mount('#adawnage')
})

// var siteStellar = function() {
//     $(window).stellar({
//     responsive: false,
//     parallaxBackgrounds: true,
//     parallaxElements: true,
//     horizontalScrolling: false,
//     hideDistantElements: false,
//     scrollProperty: 'scroll'
//   });
// };
// siteStellar();