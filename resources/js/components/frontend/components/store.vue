<template>
    <section class="section-wrapper py-3 mt-3">
        <div class="container">
            <div class="section_title text-center col-12 mb-3">
                <h2>Check out our Store</h2>
                <span>
                    <p> Checkout our Music and Merch up for sale in our <a href="/store">Store</a> </p>
                </span>
            </div>
            <div class="row">
                <div class="col-sm-3 col-12 albums">
                    <albumcard :albums="albums"/>

                </div>
                <div class="col-sm-9 col-12">
                    <swiper class="swiper" :options="swiperOption">
                        <swiper-slide v-for="(product, index ) in products" :key="index">
                            <div class="person P-4" data-aos="zoom-in">
                                <div class="bio-img">
                                    <figure @click="openModal,currentSlide(index)">
                                        <img :src="'/storage/Products/thumbs/'+product.image" :alt="product.name+'_image'" class="img-fluid">
                                    </figure>
                                    <div class="social">
                                        <router-link :to="'/product/'+product.id" role="button" class="btn btn-sm btn-outline-info">
                                            View
                                        </router-link>
                                        <router-link @click.native.prevent="promptCart({
                                            id          : product.id, 
                                            name        : product.name,
                                            slug        : product.slug,
                                            image       : product.image,
                                            price       : product.price
                                        })" to="" role="button" class="btn btn-sm btn-outline-danger">
                                            Add to Cart
                                        </router-link>
                                    </div>
                                </div>
                                <h2 class="text-light">{{ product.name }}</h2>
                                <span class="sub-title">Ksh {{ product.price }}</span>
                            </div>
                        </swiper-slide>
                        <div class="swiper-pagination" slot="pagination"></div>
                    </swiper>
                </div>
            </div>
        </div>
        <!-- <v-dialog/> -->
    </section>
</template>
<script>
import albumcard from './home/albumcards'
import { mapGetters, mapActions } from 'vuex'

export default {
    name        :   "StoreFeature",
    components  :   { albumcard },
    computed    :{
        ...mapGetters({
            products    : 'shop/getHoodies',
            albums      : 'shop/getMusic'
        })
    },
    data(){
        return{
            loader : null,
            swiperOption: {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                // loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows : true
                },
                // pagination: {
                //     el: '.swiper-pagination'
                // }
            }
        
        }
    },
    methods:{
        ...mapActions({
            getProductsAction    :   'shop/getByCategories',
            addToCartAction : 'cart/addToCart'
        }),

        promptCart(item){
            this.$modal.show('dialog', {
                title: 'Add to Cart!', text: `Add <em><strong>${item.name}</strong></em> to cart? <i class="icon-shopping_cart"></i>`,
                buttons: [
                    {   title: 'Yes', handler: () => {this.addToCart(item); this.$modal.hide('dialog');
                     } },
                    {   title: 'Cancel' }
                ]
            })
        },

        addToCart(item){
            this.addToCartAction({
                id          : item.id,  
                name        : item.name,
                slug        : item.slug,
                quantity    : 1,
                image       : item.image,
                price       : item.price,
            })
        },

        openModal() {
            document.getElementById("myModal").style.display = "block";
        },

        currentSlide(n) {
            this.showSlides(n);
        },

        closeModal() {
            document.getElementById("myModal").style.display = "none";
        },



        showSlides(n) {
            let i;
            let slideIndex = 0;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }


    },
    
    mounted(){
        this.getProductsAction('hoodies')
    },
    beforeMount(){
         this.loader = this.$loading.show({
            // Optional parameters
            container: this.fullPage ? null : this.$refs.formContainer,
            onCancel: this.onCancel,
        });
    }


}
</script>
<style lang="scss" scoped>

  .example-3d {
    width: 100%;
    height: 400px;
    padding-top: 50px;
    padding-bottom: 50px;
  }

  .swiper {
    height: 100%;
    width: 100%;

    .swiper-slide {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 300px;
      height: 300px;
      text-align: center;
      font-weight: bold;
      font-size: 12;
      background-color: transparent;
      background-position: center;
      background-size: cover;
      color: #fff;
    }

    .swiper-pagination {
      .swiper-pagination-bullet.swiper-pagination-bullet-active {
        background-color: #fff;
      }
    }
  }
</style>