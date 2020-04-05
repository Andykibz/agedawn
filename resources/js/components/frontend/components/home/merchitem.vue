<template>
    <div class="person P-4" data-aos="zoom-in">
        <div class="bio-img">
            <figure>
                <img :src="'/storage/Products/thumbs/'+product.image" :alt="product.name+'_image'" class="img-fluid">
            </figure>
            <div class="social">
                <router-link :to="'/product/'+product.id" role="button" class="btn btn-sm btn-outline-info">
                    View
                </router-link>
                <router-link @click.native.prevent="addToCart" to="" role="button" class="btn btn-sm btn-outline-danger">
                    Add to Cart
                </router-link>
            </div>
        </div>
        <h2 class="text-light">{{ product.name }}</h2>
        <span class="sub-title">Ksh {{ product.price }}</span>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name    : 'IndexMerchItems',
    props   :   {
        product: Object,
    },
    methods:{
        ...mapActions({
            addToCartAction : 'cart/addToCart'
        })        
        ,

        addToCart(){
            this.addToCartAction({
                id          : this.product.id,  
                name        : this.product.name,
                slug        : this.product.slug,
                quantity    : 1,
                image       : this.product.image,
                price       : this.product.price,
            })
        },
    },
}
</script>

<style>

</style>