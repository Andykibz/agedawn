<template>
    <div>
        <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(/imgs/drums.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-end text-center justify-content-center">
                <div class="col-md-8 mb-4">
                    <span class="sub-text pt-4">{{ product.category }}</span>
                    <h1>Product Details</h1>
                </div>
                </div>
            </div>
        </div>  
        <div class="container mt-5">
            <div class="row mb-5">        
                <main class="col-10 mx-auto" >
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <img class="img-fluid img-thumbnail" :src="'/storage/Products/'+product.image" alt="">
                        </div>
                        <div class="col-md-6 col-12 d-flex flex-column">
                            <h2 class="text-light text-center" v-text="product.name"></h2>
                        </div>
                    </div>              
                </main>
            </div>            
        </div>
    </div>
</template>
<script>
import ProductDetail from '../components/sub/productdetail'
export default {
    name    :   "Product",
    components  :   { ProductDetail },
    data(){
        return{
            product : {}
        }
    },
    watch: {
        '$route': 'fetchData'
    },
    methods:{
        getProduct( id ){
            self = this
            axios.get(`/api/product/${id}`)
                .then((response)=>{
                    console.log(response.data)
                    self.product = response.data.data
                }).catch((err)=>{
                    console.log(err.response.data.message);
                    
                })
        },
        created_date( date ){
            let months = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec' ]
            let month   = months[new Date(date).getUTCMonth()]
            let year    = String( new Date(date).getUTCFullYear() ).replace('20',"'")
            return `${month} ${new Date(date).getUTCDate()} ${year}`
        },
    },
    mounted(){
        this.getProduct(this.$route.params.id)
    }
}
</script>
<style scoped>

</style>