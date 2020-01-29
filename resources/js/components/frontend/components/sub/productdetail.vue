<template>
    <div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div style="width:300px">
                <!-- <zoom-on-hover img-normal="img" :img-zoom="imglg" :scale="1.5" :disabled="true"></zoom-on-hover> -->

                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                
            </div>
        </div>
    </div>
</template>
<script>
// import ZoomOnHover from '@intera/vue-zoom-on-hover/zoomOnHover'
// import '@intera/vue-zoom-on-hover/zoomOnHover.css'


export default {
    name    :   "ProductDetail",
    // components  :   { zoomOnHover },
    data(){
        return{
            'img'   :   '/storage/Shop/Merch/product.jpg',
            'imglg'   :   '/storage/Shop/Merch/product_lg.jpg',
            'name'  :   'Bag Coat'
        }
    }
}
</script>
<style scoped>

</style>