<template>
    <div>
        <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(./imgs/drums.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center text-center justify-content-center">
                    <div class="col-md-8 mt-5">
                        <span class="sub-text">Adawnage Band</span>
                        <h1>What's in our Galleries</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <VideoPlayer></VideoPlayer>
        </div>
    </div>
</template>

<script>
import VideoPlayer from '../components/video'

export default {
    name    :   "Media",
    components  : { VideoPlayer, },
    data(){
        return{

        }
    }
}
</script>