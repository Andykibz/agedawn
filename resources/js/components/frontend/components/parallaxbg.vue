<template>
<div class="">
    <div class="parallax-view"             
            :style="{'background-image':'url(./imgs/'+image+')'}"
            data-stellar-background-ratio="0.3">
        <div class="container">
            <div class="inner-content d-flex justify-content-center" data-aos="zoom-in-up">
                <h2 class="">{{ text }}</h2>
            </div>
        </div>
    </div> 
</div>
</template>
<script>
export default {
    name: "ParallaxBG",
    props: [ 'image', 'text' ],
    data(){
        return{

        }
    }
}
</script>
<style scoped>
    @media only screen and (max-width: 600px) {
        .inner-content{
            width:400px
        }
    }

    @media only screen and (max-width: 800px) {
        /* background-size: 10% !important; */
    }
</style>