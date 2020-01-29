require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router'
import Adawnage from './components/frontend/Adawnage.vue'
import routes from './components/frontend/router.js'
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


import ZoomOnHover from '@intera/vue-zoom-on-hover/zoomOnHover'
Vue.use(ZoomOnHover)

library.add(fas,fab)
import 'aos/dist/aos.css'

import AOS from 'aos';
AOS.init({
   duration: 800,
    easing: 'slide',
    once: true
});

Vue.component('font-awesome-icon', FontAwesomeIcon)


const router = new VueRouter({
    mode: 'history',
    routes
})

Vue.use(VueRouter)

new Vue({
    router,
    render: h => h(Adawnage)
}).$mount('#adawnage')


require('./main.js');