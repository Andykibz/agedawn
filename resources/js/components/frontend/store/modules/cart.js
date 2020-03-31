import Axios from "axios";

export default{
   namespaced  : true,
   state:{
      product        :  {},
      cartItems      :  {},
      totalCost      :  null,
   },

   getters: {
      getCartItems( state ){
         return state.cartItems
      },

      getTotalCost( state ){
         return state.totalCost
      },
   }, 

   mutations:{

      ADD_TO_CART( state, product ){
         
         if( state.cartItems[product.slug] == undefined ){
            state.cartItems[product.slug] = product
         }else if( state.cartItems[product.slug] != undefined ){
            state.cartItems[product.slug].quantity += product.quantity
         }
      },

      SET_CART( state, cartItems=state.cartItems ){
         state.cartItems = cartItems
      },

      SET_TOTAL_COST( state, total ){
         state.totalCost = total
      },

      SAVE_CART( state ){
         localStorage.setItem( 'adawnage.cartItems', JSON.stringify( state.cartItems ) )
      },

      CHANGE_QUANTITY( state, obj ){
         state.cartItems[obj.slug].quantity = parseInt(obj.num)
      },

      DELETE_ITEM(state,slug){
         console.log(slug);
         
         let RemCartItems = {}
         for (const key in state.cartItems) {
            if ( key != slug ) {
               RemCartItems[key] = state.cartItems[key]
            }
         }
         console.log(RemCartItems);
         
         state.cartItems = RemCartItems;
      }

   },
   actions:{
         addToCart( { commit }, product ){
            commit('ADD_TO_CART',product);
            
            commit('SAVE_CART');
            commit('SET_CART');
            dispatch('calc_total')
         },
        
         retrieveCartItems( { commit, dispatch } ){
               let cartItems = JSON.parse (localStorage.getItem('adawnage.cartItems') )
               if( cartItems ){
                  commit('SET_CART', cartItems )
               }

               dispatch('calc_total')
         },

         calc_total( {commit, state} ){
            let total = 0;
            for (const key in state.cartItems) {
               if (state.cartItems.hasOwnProperty(key)) {
                  total += parseInt(state.cartItems[key].price) * parseInt(state.cartItems[key].quantity)
               }
            }
            commit('SET_TOTAL_COST', total)

         },

         async saveCart( { commit } ){
            commit('SAVE_CART')
         },

         changeQuantity( { commit, dispatch }, obj ){
            commit('CHANGE_QUANTITY', obj )
            dispatch( 'calc_total' )
            commit('SAVE_CART')
         },

         deleteItem( { commit, dispatch }, slug ){
            commit('DELETE_ITEM',slug)
            dispatch( 'calc_total' )
            commit('SAVE_CART')
         }

   },
};