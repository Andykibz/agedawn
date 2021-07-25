import Axios from "axios";

export default{
    namespaced  : true,
    state:{
            product:{
                id          : null,
                name        : null,
                sku_num     : null,
                category_id : null,
                image       : null,
                description : null,
                quantity    : null,
                price       : null,
            },
            products        : [],
            meta            : {},
            links           : {},
            categories      : [],
    },

    getters: {
        getProduct( state ){
            return state.product
        },

        getProducts( state ){ return state.products },
        
        getCurrrentPage( state ){ return state.meta.current_page },
        getLastPage( state ){ return state.meta.last_page },
        
        getFirstPageLink( state ){ return state.links.first },
        getNextPageLink( state ){ return state.links.next },
        getPreviousPageLink( state ){ return state.links.prev },
        getLastPageLink( state ){ return state.links.last },
        
        getCategories( state ){ return state.categories },

        getCategoryName : ( state ) => (id)  =>{
            return state.categories.find(category => category.id === id)
        },
    
        
    },

    mutations:{
        SET_TOKEN(state, token){
            state.token = token
        },
        SET_USER(state,user){
            state.user = user
        },
        SET_CATEGORIES(state, categories){
            state.categories = categories;
        },
        SET_PRODUCT( state, product){
            state.product =  product
        },
        SET_PRODUCTS(state, products){
            
            state.products  = products.data;
            state.meta      = products.meta;
            state.links     = products.links;
        },
        RESET_PRODUCT(state){
            state.product.id          = null
            state.product.name        = null
            state.product.sku_num     = null
            state.product.category_id = null
            state.product.image       = null
            state.product.description = null
            state.product.quantity    = null
            state.product.price       = null
        }

    },
    actions:{

        async queryProducts( { commit }, query = '/api/admin/products' ){
            await axios.get(query)
                 .then((response)=>{
                    commit('SET_PRODUCTS',response.data)
                }).catch((err)=>{
                    console.log(err.response.data.message);
                    
                })
        },

        async queryProduct( { commit }, id ){
            await axios.get(`/api/admin/product/${id}`)
            .then((response)=>{
                commit('SET_PRODUCT',response.data)    
                
            })
        },

        async queryCategories( {commit} ){
            let response =  await axios.get('/api/admin/categories').then((response)=>{
                commit('SET_CATEGORIES',response.data)    
            })
        },

        async saveProduct( _ , productForm ){
            let url = ''
            if( productForm.get('id') == "null" ){
                url = '/api/admin/product'
            }else if( productForm.get('id') != null ){
                url = `/api/admin/product/${productForm.get('id')}`
            }           
            
            return await axios({
                method: 'post',
                url: url,
                data: productForm,
                headers: {'Content-Type': 'multipart/form-data' }
            })
        },

        async deleteProduct(_,id) {
            let url = '/api/admin/product/' + id;
            return await axios({
                method: 'DELETE',
                url: url,
            })

        },

        async resetProduct( { commit } ){
            commit('RESET_PRODUCT')
        },

    },
};
