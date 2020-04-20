<template>
    <div class="col-md-4">
            <div class="person P-4" data-aos="zoom-in">
              <div class="bio-img">
                <figure>
                  <img :src="'/storage/Products/thumbs/'+item.image" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                    <router-link :to="'/product/'+item.id" role="button" class="btn btn-sm btn-outline-info">
                        <!-- <font-awesome-icon style="cursor:pointer;" icon="eye" class="text-primary"/> -->
                        View
                    </router-link>
                    <router-link @click.native.prevent="promptCart" to="" role="button" class="btn btn-sm btn-outline-danger">
                        Add to Cart
                    </router-link>
                </div>
              </div>
              <h2 class="text-light">{{ item.name }}</h2>
              <span class="sub-title">Ksh {{ item.price }}</span>
            </div>
            <v-dialog/>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    name        :   "MerchItem",
    computed    :   {},
    props       :   {
                        item: Object,
                        static: Boolean,
                    },
    data(){
        return{
        
        }
    },
    methods:{
        ...mapActions({
            addToCartAction : 'cart/addToCart'
        }),
        promptCart(){
            this.$modal.show('dialog', {
                title: 'Add to Cart!', text: `Add <em><strong>${this.item.name}</strong></em> to cart? <i class="icon-shopping_cart"></i>`,
                buttons: [
                    {   title: 'Yes', handler: () => {this.addToCart(); this.$modal.hide('dialog');
                     } },
                    {   title: 'Cancel' }
                ]
            })
        },
        addToCart(){

            this.addToCartAction({
                id          : this.item.id,  
                name        : this.item.name,
                slug        : this.item.slug,
                quantity    : 1,
                image       : this.item.image,
                price       : this.item.price,
            })
        },
    },
    mounted(){
        
        
    }

    
}
</script>
<style >
.dialog-c-text > strong{
    font-weight: 500 !important;
}
</style>