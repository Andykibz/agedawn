import Vuex from 'vuex';
import Vue from 'vue';
import auth from './modules/auth'
import shop from './modules/shop'
import cart from './modules/cart'
Vue.use(Vuex);

export default new Vuex.Store({
   state:{
         hero:{
            image    : null,
            text     : null,
         },
         SCplayer    : null,
         musictext   : null,
         storetext   : null,
         newstext    : null,
         videos      : []

   },
   getters:{
      getHero( state ){ return state.hero },

      getmusictext( state ){ return state.musictext },

      getstoretext( state ){ return state.storetext },

      getSCPlayer( state ){ return state.SCplayer },

      getnewstext( state ){ return state.newstext },

      getvideos( state ){ return state.videos },
   },
   mutations:{
      SET_SOCIAL(){

      },

      SET_INFO( state, data ){
         state.hero.image  = data[0].value
         state.hero.text   = data[1].value
         state.SCplayer    = data[2].value
         state.musictext   = data[3].value
         state.newstext    = data[4].value
         state.storetext   = data[5].value
      },

      SET_INFOArr( state, data ){
         state.videos = data[1].data
      }
   },
   actions:{
      getAdawnageAction( { commit } ){
            axios.get('/api/getHomeInfo').then((response)=>{
               commit('SET_INFO', response.data)
                              
            });
            axios.get('/api/getHomeInfoArr').then((response)=>{
               commit('SET_INFOArr', response.data.data)
            });
      }
   },
   modules:{
    auth, shop, cart
   }
});