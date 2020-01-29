<template>
    <div>
        <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(./imgs/drums.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center text-center justify-content-center">
                    <div class="col-md-8 mt-5">
                        <span class="sub-text">Adawnage Band</span>
                        <h1>Some Merch !</h1>
                    </div>
                </div>

            </div>
        </div>
        <div class="container mt-4" data-aos="slide-up">
            
                <Carousel :autoplay="true" :nav="false" :items="1" >
                    <div v-for="car in carous" :key="car.id">
                        <figure class="position-relative">
                            <img style=height:350px :src="car.img" class="img-fluid" :alt="car.title">
                            <figcaption class="position-absolute">
                                {{ car.desc }}
                            </figcaption>
                        </figure>
                    </div>
                </Carousel>
            <hr class="bg-secondary">
            <div class="row">
                <div class="col-sm-4 col-12">
                    <div class="row">
                        <div class="col-12 mini-heading text-center mb-3">
                            <h3 class="">Music</h3>
                            <p>
                                Synergistically leverage other's ubiquitous e-services.
                            </p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div v-for="album in albums" :key="album.id" class="album mb-3 col-12">
                            <div class="album-thumb ">
                                <a href="#" class="" >
                                    <div class="row">
                                        <img :src="album.img" alt="" class="img-fluid img-thumbnail col-10">
                                        <span class="col-2 d-flex flex-column">
                                            <font-awesome-icon :icon="['fas','cart-plus']"/>
                                        </span>
                                    </div>
                                    <div class="album-info">
                                        <h4 class="text0muted">{{ album.title }}</h4>
                                        <p>Dramatically underwhelm efficient core competencies with quality ROI. Credibly iterate distinctive customer.</p>
                                        <small>{{ album.price }}</small>
                                    </div>
                                </a>          
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-8 col-12">
                    <div class="row">
                        <div class="col-12 mini-heading text-center mb-3">
                            <h3 class="">Merch and Clothing</h3>
                            <p>
                                Synergistically leverage other's ubiquitous e-services.
                            </p>
                        </div>
                    </div>
                    <div v-for="product in products" :key="product.id">
                        <span class="row">
                            <div class="col-12">
                                <hr class="hr-text mt-4 mb-4"  :data-content="product.cat_name">
                            </div>
                        </span>
                        <div class="row">
                            <div v-for="item in product.items" :key="item.id" class="col-md-4 col-sm-6 col-12">                                
                                <MerchItem :item="item" v-bind:static="false"></MerchItem>
                            </div>
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
import MerchItem from './components/sub/merchitem'
import Carousel from 'vue-owl-carousel'
export default {
    name            :   "Store",
    components      :   { MerchItem,Carousel },
    data(){
        return{
            "albums" : [
                {
                    "title"      :   "Safari",
                    "img"       :   "storage/Shop/Music/safari.jpg",
                    "price"     :   "Kes 500",
                },{
                    "title"      :   "Maisha",
                    "img"       :   "storage/Shop/Music/maisha.jpg",
                    "price"     :   "Kes 500",
                }
            ],
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
            "products"  :[
                {
                    "cat_name"  :   "Hoodies",
                    "items"  :   [
                        {
                            "id"    :   "1",
                            "name"  :   "White Tee",
                            "price" :   "KES 1300",
                            "img"   :   "storage/Shop/Merch/work-image1.jpg",
                            "status":   true
                        },{
                            "id"    :   "2",
                            "name"  :   "White Tee",
                            "price" :   "KES 1300",
                            "img"   :   "storage/Shop/Merch/work-image2.jpg",
                            "status":   true
                        },{
                            "id"    :   "3",
                            "name"  :   "White Tee",
                            "price" :   "KES 1300",
                            "img"   :   "storage/Shop/Merch/work-image3.jpg",
                            "status":   true
                        }
                    ]
                },
                {
                    "cat_name"  :   "T-Shirts",
                    "items"  :   [
                        {
                            "id"    :   "4",
                            "name"  :   "White Tee",
                            "price" :   "KES 1300",
                            "img"   :   "storage/Shop/Merch/work-image1.jpg",
                            "status":   true
                        },{
                            "id"    :   "5",
                            "name"  :   "White Tee",
                            "price" :   "KES 1300",
                            "img"   :   "storage/Shop/Merch/work-image2.jpg",
                            "status":   true
                        },{
                            "id"    :   "6",
                            "name"  :   "White Tee",
                            "price" :   "KES 1300",
                            "img"   :   "storage/Shop/Merch/work-image3.jpg",
                            "status":   true
                        }
                    ]
                },{
                    "cat_name"  :   "Headware",
                    "items"  :   [
                        {
                            "id"    :   "7",
                            "name"  :   "White Tee",
                            "price" :   "KES 1300",
                            "img"   :   "storage/Shop/Merch/work-image1.jpg",
                            "status":   true
                        },{
                            "id"    :   "8",
                            "name"  :   "White Tee",
                            "price" :   "KES 1300",
                            "img"   :   "storage/Shop/Merch/work-image2.jpg",
                            "status":   true
                        },{
                            "id"    :   "9",
                            "name"  :   "White Tee",
                            "price" :   "KES 1300",
                            "img"   :   "storage/Shop/Merch/work-image3.jpg",
                            "status":   true
                        }
                    ]
                }
            ]
        }
    },
    beforeMount(){

    }
}
</script>
