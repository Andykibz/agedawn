<template>
    <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(./imgs/cover_final.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-end text-center justify-content-center">
            <div class="col-md-8 mb-4">
                <span data-aos="zoom-in" class="sub-text">Adawnage Band</span>
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

<style lang="scss" scoped>
    h1{
        font-size: 36px;
        font-weight: 100;
        text-shadow: 1px 1px 2px #333;
    }
    .sub-text{ border-bottom: 1px solid rgba(255, 255, 255, 0.7); }
</style>>