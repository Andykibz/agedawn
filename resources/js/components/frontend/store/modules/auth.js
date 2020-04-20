import Axios from "axios";

export default{
   namespaced  : true,
   state:{
      token : null,
      user  : null, 
   },

   getters: {
      authenticated( state ){
         return state.token
      },

      user(state){
         return state.user
      }
   }, 

   mutations:{
      SET_TOKEN(state, token){
         state.token = token
      },
      SET_USER(state,user){
         state.user = user  
      }
   },
   actions:{
      async signIn( {dispatch}, credentials ){
         let response =  await axios.post('/api/auth/signin', credentials)
         await dispatch('attempt',response.data.access_token)
         return response
      },
      async googleSignIn( { dispatch }, profile ){
         await axios.post('/api/auth/google/authenticate',profile)
            .then((response)=>{
               return dispatch('attempt',response.data.access_token)
            }).catch((err)=>{
               console.log(err.response.data);
            })
      },

      async initUser( { dispatch } ){
         let adawnage_token = localStorage.getItem('adawnage.token')         
         dispatch('attempt',adawnage_token)
      },

      async attempt( {commit, state}, token){
         
         if ( token ){
            commit('SET_TOKEN',token)         
         }
         if( !state.token ){
            return
         }
         try {
            // Check if we are autheticated
            let response =  await axios.get('/api/auth/getuser')                          
            commit('SET_USER', response.data)

         } catch (error) {
            console.log(error);
            commit( 'SET_TOKEN', null)
            commit( 'SET_USER', null)
         }
         
      },
      signOut( {commit}){
         return axios.post('/api/auth/signout').then((response)=>{
            console.log(response.data);
            
            commit('SET_TOKEN',null)
            commit('SET_USER',null)
         })
      }

   },
};