import Axios from "axios";

export default{
   namespaced  : true,
   state:{
      token : null,
      user  : null, 
      admin : null,
   },

   getters: {
      admin( state ){
         return state.admin
      },

      authenticated( state ){
         return state.token
      },

      user(state){
         return state.user
      }
   }, 

   mutations:{
      SET_ADMIN(state,admin){
         state.admin = admin
      },
      SET_TOKEN(state, token){
         state.token = token
      },
      SET_USER(state, token){
         state.token = token
      },
   },
   actions:{
      async initUser( { dispatch,commit } ){
         let res = await axios.get('/api/admin/isenforced')
         if( res.data != 0 ){
            let adawnage_token = localStorage.getItem('adawnage.token')         
            dispatch('attempt',adawnage_token)
         }else{
            commit('SET_ADMIN', true)
         }
      },

      isAdmin( { commit },token ){
         
         
         axios.get('/api/admin/isBackend').then((response)=>{
            commit('SET_ADMIN', true)
         }).catch((err)=>{
            console.log(err.response.data);
            
            commit('SET_ADMIN', false)
         });
      },

      async attempt( {commit, state}, token){
         
         if ( token ){
            commit('SET_TOKEN',token)         
         }
         if( !token ){
            return
         }
         try {
            // Check if we are autheticated
            let response =  await axios.get('/api/admin/isBackend')                          
            
            commit('SET_ADMIN', response.data)

         } catch (error) {
            console.log(error);
            commit( 'SET_TOKEN', null)
            commit( 'SET_ADMIN', false)
         }
         
      },
      

   },
};