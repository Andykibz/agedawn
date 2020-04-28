<template>
    <div>
        <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(/imgs/cover_final.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">
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
                        <div class="col-md-6 col-12 d-flex justify-content-center align-items-center" data-aos="slide-up">
                            <img class="imghov img-fluid" :src="`/storage/Products/thumbs/${product.image}`" :data-zoom="`/storage/Products/${product.image}`">
                        </div>
                        <div class="col-md-6 col-12 d-flex flex-column align-items-center text-justify prod_details" data-aos="slide-up">
                            <h2 class="text-light text-center mb-3" v-text="product.name"></h2>
                            <star-rating class="mb-2" :increment=".1" :star-size="20" :rating="rating" :read-only="true" :show-rating="false"></star-rating>
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
                                <input class="quantity mr-3" type="number" v-model="quantity"  placeholder="Quantity" min="1" :max="product.quantity">
                                <i @click="(quantity < product.quantity ) ? quantity = quantity + 1 : quantity=product.quantity" class="btn btn-sm btn-outline-secondary icon-plus"></i> 
                            </div>

                            <div class="d-flex flex-row align-content-center mb-3">
                                <button @click="promptCart()" class="btn btn-outline-warning mr-2">Add to Cart</button>
                                <button data-toggle="modal" data-target="#cartModal" class="btn btn-outline-danger mr-2">Check Out</button>
                            </div>

                            <div class="product-description-wrapper mb-3">
                                <!-- <h5 class="text-muted">Product Description</h5> -->
                                <div class="mb-3" v-html="product.description"></div>
                            </div>
                        </div>
                    </div>        
                    <hr style="background:#ddd">      
                    <section id="reviews">
                        <Reviews :product="product"/>

                    </section>

                </main>
            </div>            
        </div>
        <v-dialog/>
    </div>
</template>
<script>
import Reviews from '../components/reviews'
import Drift from 'drift-zoom'
import StarRating from 'vue-star-rating'
import { mapActions,mapGetters } from 'vuex'


export default {
    name    :   "Product",
    components  :   { Reviews, StarRating },
    computed    :   {
        ...mapGetters({
            rating   :   'shop/getRating'            
        })
    },
    data(){
        return{
            product     : {},
            quantity    : 1,
            zoomerOptions : {
                zoomFactor: 3,
                pane: "pane",
                hoverDelay: 300,
                namespace: "zoomer-bottom",
                move_by_click: false,
                scroll_items: 4,
                choosed_thumb_border_color: "#dd2c00",
                scroller_position: "bottom",
                zoomer_pane_position: "right"
            }
            
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
            addToCartAction     :   'cart/addToCart',
            getReviewsAction    :   'shop/queryReviews',
        }),
        promptCart(){
            this.$modal.show('dialog', {
                title: 'Add to Cart!', text: `Add <em><strong>${this.product.name}</strong></em> to cart? <i class="icon-shopping_cart"></i>`,
                buttons: [
                    {   title: 'Yes', handler: () => {this.addToCart(); this.$modal.hide('dialog');
                     } },
                    {   title: 'Cancel' }
                ]
            })
        },

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
        new Drift(document.querySelector(".imghov"), {
                paneContainer: document.querySelector(".prod_details"),
                zoomFactor: 2,
                hoverDelay: 200,
        });
        this.getReviewsAction(this.$route.params.id)
        
    },
    beforeMount(){
        this.getProduct(this.$route.params.id);

       
    },
    
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
    img:hover{
        cursor: zoom-in !important;
    }
    h1{
        font-size: 36px;
        font-weight: 100;
        text-shadow: 1px 1px 2px #333;
    }
    .product-description-wrapper{
        max-height: 20vh;
        margin-left: 30px;
        padding-right:1em;
        float: left;
        overflow-y: scroll;
        /*
        *  STYLE 1
        */

        &::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 3px rgba(8, 7, 7, 0.3);
            border-radius: 10px;
            background-color: rgb(0,0,0);
        }

        &::-webkit-scrollbar
        {
            width: 8px;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.9);
        }

        &::-webkit-scrollbar-thumb
        {
            border-radius: 8px;
            -webkit-box-shadow: inset 0 0 6px rgba(32, 20, 20, 0.3);
            background-color: rgb(65, 60, 60);
        }

    }

    
</style>