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
                            <!-- <img class="img-fluid " :src="'/storage/Products/'+product.image" alt=""> -->
                              <zoom-on-hover img-normal="'/storage/Products/IMG_7093_1585442130.jpg'"></zoom-on-hover>

                        </div>
                        <div class="col-md-6 col-12 d-flex flex-column align-items-center text-justify">
                            <h2 class="text-light text-center mb-3" v-text="product.name"></h2>
                            <div class="stock mb-3 text-light">
                                <span >In Stock: </span>
                                <span v-text="product.quantity"></span>
                            </div>
                            <div class="price mb-3 text-light">
                                <span>Price: </span>
                                <strong>Ksh&nbsp;</strong><span v-text="product.price"></span>
                            </div>
                            <div class="d-flex flex-row align-content-center mb-3">
                                <i @click="(quantity > 1 ) ? quantity = quantity - 1 : quantity =  1" class="btn btn-sm btn-outline-secondary icon-minus mr-3"></i> 
                                <input class="quantity mr-3" type="number" v-model="quantity"  placeholder="Quantity" min="1">
                                <i @click="quantity = quantity + 1" class="btn btn-sm btn-outline-secondary icon-plus"></i> 
                            </div>

                            <div class="d-flex flex-row align-content-center mb-3">
                                <button @click="addToCart()" class="btn btn-outline-warning mr-2">Add to Cart</button>
                                <button  class="btn btn-outline-danger mr-2">Check Out</button>
                            </div>

                            <div class="product-description mb-3">
                                <!-- <h5 class="text-muted">Product Description</h5> -->
                                <p class="mb-3" v-text="product.description"></p>
                            </div>
                        </div>
                    </div>        
                    <hr style="background:#ddd">      
                </main>
            </div>            
        </div>
    </div>
</template>
<script>
import ProductDetail from '../components/sub/productdetail'

import { mapActions } from 'vuex'
export default {
    name    :   "Product",
    components  :   { ProductDetail },
    data(){
        return{
            product     : {},
            quantity    : 1,
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
                    self.product = response.data.data
                }).catch((err)=>{
                    console.log(err.response.data.message);
                    
            })
        },

        ...mapActions({
            addToCartAction : 'cart/addToCart'
        })        
        ,
        addToCart(){
            
            this.addToCartAction({
                id          : this.product.id,
                name        : this.product.name,
                slug        : this.product.slug,
                quantity    : this.quantity,
                image       : this.product.image,
                price       : this.product.price,
            })
            this.quantity = 1;
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
<style lang="scss" scoped>
    input.quantity{
        width: 60px;
        text-align: center;
        &[attr='placeholder']{
            text-align: center;
        }
        border: none;
        border-bottom: #ddd solid 1px;
        background: transparent;
        color: #f8f9fa;
    }
    .stock,.price{
        font-size: large;
    }
</style>