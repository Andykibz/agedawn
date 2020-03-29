import Vuex from 'vuex';
import Vue from 'vue';
import auth from './modules/auth'
import shop from './modules/shop'
Vue.use(Vuex);

export default new Vuex.Store({
   state:{

   },
   mutations:{

   },
   actions:{

   },
   modules:{
    auth, shop
   }
});