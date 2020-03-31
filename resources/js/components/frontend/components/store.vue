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
                        <div v-for="item in items" :key="item.id" data-aos="slide-up" class=" mb-3 px-3">
                            <div class="person P-4" data-aos="zoom-in">
                                <div class="bio-img">
                                    <figure>
                                        <img :src="'/storage/Products/thumbs/'+item.image" alt="Image" class="img-fluid">
                                    </figure>
                                    <div class="social">
                                        <router-link :to="'/product/'+item.id" role="button" class="btn btn-sm btn-outline-info">
                                            View
                                        </router-link>
                                        <router-link to="#" role="button" class="btn btn-sm btn-outline-danger">
                                            Add to Cart
                                        </router-link>
                                    </div>
                                </div>
                                <h2 class="text-light">{{ item.name }}</h2>
                                <span class="sub-title">Ksh {{ item.price }}</span>
                            </div>
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
import { mapGetters, mapActions } from 'vuex'

export default {
    name        :   "StoreFeature",
    props       :   [ ],
    components  :   { albumcard,MerchItem,carousel },
    computed    :{
        ...mapGetters({
            // items : 'shop/getHoodies'
        })
    },
    data(){
        return{
            items : [
                        {
                            "id": 1,
                            "name": "Adawnage Hoodie Red",
                            "slug": "adanage-hoodie-red",
                            "sku_num": "ADG_HD_RD_1",
                            "image": "IMG_7091_1585442080.jpg",
                            "category_id": "1",
                            "description": "Distinctively revolutionize team driven deliverables through ubiquitous leadership. Uniquely brand client-centered leadership skills before synergistic benefits. Appropriately.",
                            "quantity": "12",
                            "price": "1000",
                            "created_at": "2020-03-29 03:34:41",
                            "updated_at": "2020-03-29 15:15:40"
                        },
                        {
                            "id": 2,
                            "name": "Adawnage Hoodie - Beige",
                            "slug": "adawnage-hoodie-beige",
                            "sku_num": "ADG_HD_BG_1",
                            "image": "IMG_7093_1585442130.jpg",
                            "category_id": "1",
                            "description": "Completely re-engineer innovative value whereas clicks-and-mortar sources. Compellingly engage future-proof internal or \"organic\" sources and cross functional.",
                            "quantity": "13",
                            "price": "1000",
                            "created_at": "2020-03-29 03:35:31",
                            "updated_at": "2020-03-29 03:35:31"
                        },
                        {
                            "id": 3,
                            "name": "Adawnage Hoodie - Black",
                            "slug": "adawnage-hoodie-black",
                            "sku_num": "ADG_HD_BL_1",
                            "image": "IMG_7086_1585442181.jpg",
                            "category_id": "1",
                            "description": "Objectively impact high standards in solutions without plug-and-play architectures. Competently evisculate tactical applications after professional models. Appropriately.",
                            "quantity": "23",
                            "price": "1000",
                            "created_at": "2020-03-29 03:36:22",
                            "updated_at": "2020-03-29 03:36:22"
                        }
                    ]
        }
    },
    methods:{
        getHoodies(){
            self = this
            axios.get('/api/category/hoodies')
            .then((response)=>{
                self.items = response.data[0]
                console.log(self.items);
            }).catch((err)=>{
                console.log(err.repsonse.data.message);
                
            })
        },
        ...mapActions({
            getHoodiesAction    :   'shop/getByCategories',
        })
    },
    mounted(){
        // this.getHoodiesAction('hoodies')
    }

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