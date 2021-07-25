<template>
    <div class="site-blocks-cover overlay "             
            :style="{'background-image':'url(./imgs/groupshot2.jpg)'}"
            data-aos="fade" data-stellar-background-ratio="0.3">
            <div class="container">
                <div class="row align-items-center text-center justify-content-center">
                    <div class="col-md-8 col-11">
                            <span class="d-md-block d-lg-none hero-sub-text border-bottom border-light">Adawnage Band</span>
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

        }
    }
}
</script>
<style lang="scss">
