<template>
    <div class="parallax-view"             
            :style="{'background-image':'url(./imgs/'+image+')'}"
            data-stellar-background-ratio="0.3" 
            >
            <div class="container">
                <div class="inner-content" data-aos="zoom-in-up">
                    <h2>{{ text }}</h2>
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