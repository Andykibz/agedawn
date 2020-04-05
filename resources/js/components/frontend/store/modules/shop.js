import Axios from "axios";

export default{
   namespaced  : true,
   state:{
      hoodies  :    {},
      music    :    {},
      cart     :    {},
   },

   getters: {
      getHoodies( state ){
         return state.hoodies[0]
      },
      getMusic( state ){
        return state.music[0]
     },
   }, 

   mutations:{

      SET_HOODIES(state, hoodies){
         state.hoodies = hoodies
      },
      SET_MUSIC( state, music ){
          state.music = music
      }

   },
   actions:{
        getByCategories( { commit }, name ){
            axios.get('/api/category/'+name)
                .then((response)=>{ 
                    if ( name == 'hoodies'){
                        commit('SET_HOODIES',response.data)
                    }else if( name == 'music'){
                        commit('SET_MUSIC',response.data)
                    }
                }).catch((err)=>{
                    console.log(err.response.data.message);
                })
        },

   },
};