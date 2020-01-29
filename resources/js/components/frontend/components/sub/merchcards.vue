<template>
    <carousel :autoplay="false" :nav="false" :items="3" >
        <div v-for="merch in merch" :key="merch.id" data-aos="slide-up"
            class="album mb-3 col-12 animated slideInUp">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img :src="merch.img" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                    <a href="#" role="button" class="btn btn-sm btn-outline-info">
                        <!-- <font-awesome-icon style="cursor:pointer;" icon="eye" class="text-primary"/> -->
                        View
                    </a>
                    <a href="#" role="button" class="btn btn-sm btn-outline-danger">
                        <!-- <font-awesome-icon style="cursor:pointer;" icon="eye" class="text-primary"/> -->
                        Add to Cart
                    </a>
                  <!-- <font-awesome-icon style="cursor:pointer;" icon="cart-plus" size="1x" class="text-primary"/>
                  <font-awesome-icon style="cursor:pointer;" icon="eye" size="1x" class="text-primary"/> -->
                </div>
              </div>
              <h2 class="text-light">{{ merch.name }}</h2>
              <span class="sub-title">{{ merch.price }}</span>
            </div>
        </div>
    </carousel>
</template>
<script>
import carousel from 'vue-owl-carousel'
export default {
    name        :   "MerchCard",
    props       :   [''],
    components  :   { carousel },
    data(){
        return{
            "merch" : [
                {
                    "name"      :   "Hoodie",
                    "img"       :   "storage/Shop/Merch/work-image1.jpg",
                    "price"     :   "Kes 1000",
                },{
                    "name"      :   "Polo",
                    "img"       :   "storage/Shop/Merch/work-image2.jpg",
                    "price"     :   "Kes 1500",
                },{
                    "name"      :   "T-Shirt",
                    "img"       :   "storage/Shop/Merch/work-image3.jpg",
                    "price"     :   "Kes 1200",
                },{
                    "name"      :   "SweatShirs",
                    "img"       :   "storage/Shop/Merch/work-image4.jpg",
                    "price"     :   "Kes 900",
                }
            ]
        }
    }
}
</script>
<style scoped>
    
</style>