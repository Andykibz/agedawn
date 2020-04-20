import Vuex from 'vuex';
import Vue from 'vue';
import products from './modules/products'
import auth from './modules/auth'
Vue.use(Vuex);

export default new Vuex.Store({
   state:{

   },
   mutations:{

   },
   actions:{

   },
   modules:{
      products,auth
   }
});
