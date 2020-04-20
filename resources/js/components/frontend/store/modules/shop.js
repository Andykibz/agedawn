import Axios from "axios";

export default{
   namespaced  : true,
   state:{
      hoodies   :   {},
      music     :   {},
      cart      :   {},
      reviews   :   {},
      rating    :   null,
   },

   getters: {
      getHoodies( state ){
         return state.hoodies[0]
      },
      getMusic( state ){
        return state.music[0]
     },
     getReviews(state){
        return state.reviews
     },
     getRating(state){
        return state.rating
     }
   }, 

   mutations:{

      SET_HOODIES(state, hoodies){
         state.hoodies = hoodies
      },
      SET_MUSIC( state, music ){
          state.music = music
      },
      SET_REVIEWS( state, data ){
          state.reviews = data.reviews.data
          state.rating = data.ratings
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

        queryReviews( { commit }, id){
            axios.get(`/api/product/${id}/reviews`)
                .then((response)=>{
                    console.log(response.data);
                    
                    commit('SET_REVIEWS',response.data)
                }).catch((err)=>{
                    console.log(err.response.data);
                    
                })
        }

   },
};