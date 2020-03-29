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
         return dispatch('attempt',response.data.access_token)
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
            commit('SET_TOKEN',null)
            commit('SET_USER',null)

         }
         
      },
      signOut( {commit}){
         return axios.post('/api/auth/signout').then(()=>{
            commit('SET_TOKEN',null)
            commit('SET_USER',null)
         })
      }

   },
};