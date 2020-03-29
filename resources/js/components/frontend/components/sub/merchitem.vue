<template>
    <div class="col-md-4"  >
        
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
                    <router-link to="#" role="button" class="btn btn-sm btn-outline-danger">
                        <!-- <font-awesome-icon style="cursor:pointer;" icon="eye" class="text-primary"/> -->
                        Add to Cart
                    </router-link>
                  <!-- <font-awesome-icon style="cursor:pointer;" icon="cart-plus" size="1x" class="text-primary"/>
                  <font-awesome-icon style="cursor:pointer;" icon="eye" size="1x" class="text-primary"/> -->
                </div>
              </div>
              <h2 class="text-light">{{ item.name }}</h2>
              <span class="sub-title">Ksh {{ item.price }}</span>
            </div>
    </div>
</template>
<script>
export default {
    name        :   "MerchItem",
    computed    : {
                  // hoodies : getCat('Hoodie'),
                  // music : getCat('Music Albums')
          },
    props       :   {
                        item: Object,
                        static: Boolean,
                    },
    data(){
        return{
        
        }
    },
    methods:{
        
    },
    mounted(){
        
        
    }

    
}
</script>
<style scoped>

</style>