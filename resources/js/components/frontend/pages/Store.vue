<template>
    <div>
        <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(./imgs/drums.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-end text-center justify-content-center">
                    <div class="col-md-8 mt-5 mb-4">
                        <span class="sub-text">Adawnage Band</span>
                        <h1>Check out our Store</h1>
                    </div>
                </div>

            </div>
        </div>
        <div class="container mt-4 mx-auto" data-aos="slide-up">
            <!-- <hr class="bg-secondary"> -->
            <div class="row d-flex justify-content-center">
                <div class="col-sm-9 col-12">
                    <div class="row">
                        <div class="col-12 mini-heading text-center mb-3">
                            <h3 class="">Music and Merch</h3>
                            <p>Synergistically leverage other's ubiquitous e-services.</p>
                        </div>
                    </div>
                    <div>
                        <span class="row">
                            <div class="col-12">
                                <hr class="hr-text mt-4 mb-4"  :data-content="'Music Albums'">
                            </div>
                        </span>
                        <div class="row d-flex justify-content-center">
                            <MerchItem v-for="music in music" :key="music.id" :item="music" v-bind:static="false"></MerchItem>
                        </div>
                    </div>
                    <div>
                        <span class="row">
                            <div class="col-12">
                                <hr class="hr-text mt-4 mb-4"  :data-content="'Hoodies'">
                            </div>
                        </span>
                        <div class="row">
                            <MerchItem v-for="hoodie in hoodies" :key="hoodie.id" :item="hoodie" v-bind:static="false"></MerchItem>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                
            </div>
        </div>
    </div>
</template>
<script>
import MerchItem from '../components/sub/merchitem'
import Carousel from 'vue-owl-carousel'
import { log } from 'util'
import { mapActions,mapGetters } from 'vuex';
export default {
    name            :   "Store",
    components      :   { MerchItem,Carousel },
    computed :{
            ...mapGetters({
                    hoodies : 'shop/getHoodies',
                    music   : 'shop/getMusic',
            })
    },
    data(){
        return{
            
            "carous"  :   [
                {
                    'title' :   "Top fitted Caps",
                    'img'   :   "storage/Shop/carousel/car_img3.jpg",
                },{
                    'title' :   "Hot Hoodies",
                    'img'   :   "storage/Shop/carousel/car_img2.png",
                },{
                    'title' :   "Hot Hoodies",
                    'img'   :   "storage/Shop/carousel/car_img1.jpg",
                },
                {
                    'title' :   "Winter Sale",
                    'img'   :   "storage/Shop/carousel/car_img4.gif",
                },
            ],
            
        }
    },
    methods:{
        ...mapActions({
            getByCategories : 'shop/getByCategories'
        })
        
    },
    mounted(){
        this.getByCategories('hoodies')
        this.getByCategories('music')
    },
    beforeMount(){

    }
}
</script>
