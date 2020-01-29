<template>
    <section class="section-wrapper py-3 mt-3">
        <div class="container">
            <div class="section_title text-center col-12 mb-3">
                <h2>Check out our Store</h2>
                <p>Esteem spirit temper too say adieus who direct esteem. <br>
                    It esteems luckily or picture placing drawing. </p>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 albums">
                    <albumcard/>

                </div>
                <div class="col-sm-8 col-12">
                    <carousel :autoplay="true" :nav="false" :items="3" >
                        <div v-for="item in items" :key="item.id" data-aos="slide-up"
            class=" mb-3 px-3">
                            <MerchItem class="" v-bind:item="item" v-bind:static="true"></MerchItem>
                        </div>

                    </carousel>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import albumcard from './sub/albumcards'
import MerchItem from './sub/merchitem'
import carousel from 'vue-owl-carousel'

export default {
    name        :   "StoreFeature",
    props       :   [],
    components  :   { albumcard,MerchItem,carousel },
    data(){
        return{
            "items" : [
                {
                    "id"        :   "1",
                    "name"      :   "Hoodie",
                    "img"       :   "storage/Shop/Merch/work-image1.jpg",
                    "price"     :   "Kes 1000",
                    "status"    :   true
                },{
                    "id"        :   "2",
                    "name"      :   "Polo",
                    "img"       :   "storage/Shop/Merch/work-image2.jpg",
                    "price"     :   "Kes 1500",
                    "status"    :   true
                },{
                    "id"        :   "3",
                    "name"      :   "T-Shirt",
                    "img"       :   "storage/Shop/Merch/work-image3.jpg",
                    "price"     :   "Kes 1200",
                    "status"    :   true
                },{
                    "id"        :   "4",
                    "name"      :   "SweatShirs",
                    "img"       :   "storage/Shop/Merch/work-image4.jpg",
                    "price"     :   "Kes 900",
                    "status"    :   true
                }
            ]
        }
    },

}
</script>
<style >
.albums{
    position: relative;
}
ul.slick-dots{
    position: absolute;
    display: flex;
    flex-direction: column;
    /* z-index: 2; */
    top:50%;
    left:0;
    list-style: none;
}
ul.slick-dots li button{ 
    width: 5px!important;
    height: 5px!important;
    border-radius: 50%;
    color: rgba(255,255,255,0);
    /* font-size: 5px; */
    background-color: rgba(0,0,0,.6);
    border:none;
    box-shadow: 2px 2px 3px #244;
}
</style>