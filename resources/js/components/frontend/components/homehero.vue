<template>
    <div class="site-blocks-cover overlay "             
            :style="{'background-image':'url(./imgs/cover_final.jpg)'}"
            data-aos="fade" data-stellar-background-ratio="0.3" 
            >
            <div class="container">
                <div class="row align-items-center text-center justify-content-center">
                    <div class="col-md-8 col-11">
                        <span data-aos="zoom-in" class="sub-text">Adawnage Band</span>
                        <h1 class="text-light herotext">
                            <!-- <small>  “Behold, I am doing a new thing; now it springs forth, do you not perceive it?"</small> -->
                            <small v-text="hero.text"></small>
                        </h1>
                        <div>
                            <!-- <swiper class="swiper" :options="swiperOption">
                                <swiper-slide>
                                    <label>Apr 30 '20</label>
                                    <span> Progressively procrastinate 2.0 niches with orthogonal sources. Collaboratively streamline parallel. </span>
                                </swiper-slide>
                                <swiper-slide>Intrinsicly facilitate turnkey potentialities without viral best.</swiper-slide>
                            </swiper> -->
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
        font-family: 'Lato', sans-serif;
        font-size: 42px;
        font-weight: 100;
    }
    .sub-text{ border-bottom: 1px solid rgba(255, 255, 255, 0.7); }
</style>
