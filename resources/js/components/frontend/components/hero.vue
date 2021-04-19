<template>
    <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(./imgs/drums.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-end text-center justify-content-center">
            <div class="col-md-8 mb-4">
                <span data-aos="zoom-in" class="hero-sub-text">Adawnage Band</span>
                <!-- <h1> {{heading}} </h1> -->
            </div>
            </div>
        </div>
    </div>  
</template>

<script>
export default {
    name    : "Hero",
    props   : ['subheading','heading']
}
</script>
