<template>
    <div>
        <div class="d-flex flex-row justify-content-between ">
            <h4>Product List  </h4>
            <small class="d-flex align-items-center"> {{ current_page }} of {{ last_page }} </small>
        </div>

        <div id="artcile-list" class="mb-1">
            <div v-for="product in products" :key="product.id" class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-5 d-flex flex-column justify-content-center ">
                    <!-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                    <img style="" class="img-fluid" :src="'/storage/Products/thumbs/'+product.image" alt="">
                </div>
                <div class="col-7 px-4 py-2 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-secondary" v-text="product.category"></strong>
                    <h4 class="mb-0" v-text="product.name"></h4>
                    <span class="mb-0 text-muted"> Pricing&nbsp;&nbsp;&nbsp;: <span class="text-success">Ksh {{ product.price }} </span>  </span>
                    <span class="text-muted"> In Stock&nbsp;: <span class="text-danger"> {{ product.quantity }}  </span> </span>
                    <!-- <p class="card-text mb-auto">{{ product.description }}</p> -->
                    <span>
                        <a @click="initEdit(product.id)" role="button" href="#edit" class="mr-3" >Edit</a>
                        <span>&nbsp;|&nbsp;</span>
                        <a @click="initDelete(product.id)" role="button" href="#edit" class="mr-3">Delete</a>
                    </span>
                </div>
        </div>
        </div>

        <paginate :prevpage="prevpage" :nextpage="nextpage" />


    </div>
</template>

<script>
import { mapGetters,mapActions } from 'vuex'
import paginate from './sub/paginate';
import { log } from 'util';
export default {
    name        :   "ProductList",
    components  :   { paginate },
    data(){
        return{
        }
    },
    computed:{
        ...mapGetters({
            products        : 'products/getProducts',
            firstLink       : 'products/getFirstPageLink',
            nextLink        : 'products/getNextPageLink',
            prevLink        : 'products/getPreviousPageLink',
            lastLink        : 'products/getLastPageLink',
            current_page    : 'products/getCurrrentPage',
            last_page       : 'products/getLastPage'
        }),
    },
    methods:{
        ...mapActions({
                queryProductsAction: 'products/queryProducts',
                queryProductAction: 'products/queryProduct'
        }),
        
        ...mapGetters({
            cat_name : 'products/getCategoryName'
        }),
        edit(id){
            // let id = Number(id)
            eventBus.$emit('productedit', id )
        },
        nextpage(){
            this.queryProductsAction(this.nextLink)
        },
        prevpage(){
            this.queryProductsAction(this.prevLink)
        },
        created_date( date ){
            let months = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec' ]
            let month   = months[new Date(date).getUTCMonth()]
            let year    = String( new Date(date).getUTCFullYear() ).replace('20',"'")
            return `${month} ${new Date(date).getUTCDate()} ${year}`
        },
        initEdit( id ){
            this.queryProductAction(id)
        },     
        initDelete( id ){

        },
    },
    beforeMount(){
        this.queryProductsAction()
    },

    mounted(){
        console.log(this.total_pages);
        
    }
    

}
</script>

<style scoped>
.del-btn{
    position: absolute;
    right: 0;
    bottom: 0;
    

}

</style>