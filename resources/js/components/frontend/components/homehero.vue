<template>
    <div class="site-blocks-cover overlay "             
            :style="{'background-image':'url(./imgs/c253b7a8-bab5-4acf-b3b3-dcf8719dea44.jpeg)'}"
            data-aos="fade" data-stellar-background-ratio="0.3">
            <div class="container">
                <div class="row align-items-center text-center justify-content-center">
                    <div class="col-md-8 col-11">
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div> 
</template>
<script>

export default {
    name    :   "HomeHero",
    computed:{
        hero(){ return this.$store.getters.getHero }
    },
    data(){
        return{
            // swiperOption: {
            //     effect: 'coverflow',
            //     grabCursor: true,
            //     centeredSlides: true,
            //     slidesPerView: 'auto',
            //     // loop: true,
            //     autoplay: {
            //         delay: 5000,
            //         disableOnInteraction: false
            //     },
            //     coverflowEffect: {
            //         rotate: 50,
            //         stretch: 0,
            //         depth: 100,
            //         modifier: 1,
            //         slideShadows : true
            //     },
            //     // pagination: {
            //     //     el: '.swiper-pagination'
            //     // }
            // }
        }
    }
}
</script>
<style scoped>
    .herotext{
        font-size: 42px;
        font-weight: 100;
    }
    .sub-text{ border-bottom: 1px solid rgba(255, 255, 255, 0.7); }
</style>
