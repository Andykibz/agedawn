<template>
    <section class="section-wrapper py-3 mt-3">
        <div class="container">
            <div class="section_title text-center col-12 mb-3">
                <h2>Our Music</h2>
                <span>
                    <p>A peek at our content on <a target='+_blank' href='https://soundcloud.com/adawnage'>Soundcloud</a> and <a target='+_blank' href='https://www.youtube.com/channel/UC8w14pp6McD-PcRagO_1r7A'>Youtube</a></p>
                </span>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-up">            
                    <iframe width="100%" height="450" scrolling="no" 
                        frameborder="no" allow="autoplay" 
                        :src="soundcloud">
                    </iframe>
                </div> 
                <div class="col-lg-6 " data-aos="fade-down">
                    <div class="row">
                        <div v-for="video in videos" :key="video.id" class="col-sm-6 col-12 videothumb text-center mb-3">
                            <div class="video-thumb mx-auto">
                                <a href="#" @click="popYoutube($event,video.url)"                        
                                    class="vid youtube"
                                    :ytSrc="video.url">
                                    <img :src="'https://i.ytimg.com/vi/'+video.url+'/mqdefault.jpg'" alt="" class="img-fluid img-thumbnail">
                                    <div class="video-info text-center">
                                        <p><font-awesome-icon class="text-muted" :icon="['fas','play-circle']" size="2x"/></p>
                                    </div>
                                </a>
                                <h4 class="text-light text-center">{{ video.title }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import BigPicture from 'bigpicture'
export default {
    name    :   "MusicFeature",
    computed:{
        videos(){ return this.$store.getters.getvideos },
        soundcloud(){ return this.$store.getters.getSCPlayer },
    },
    data(){
        return{
            
        }
    },
    methods:{
        popYoutube: function (e,url){
            console.log(url);
            
            BigPicture({
                el: e.target,
                ytSrc: url,
            })
        }
    }
}

</script>
<style scoped>
.videothumb{
    position: relative;
}
.videothumb div{
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.video-info img {
    width: 100%;
    border-radius: 100%;
  }

  #video .video-thumb {
    overflow: hidden;
    position: relative;
    cursor: pointer;
    border-radius: 3px;
  }

  .video-thumb .video-info {
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
  }

  .video-thumb .video-info:after {
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    content: "";
    background: #161515a6;
    opacity: 0;
    transition: 0.5s;
  }

  .video-thumb .video-info:hover::after {
    opacity: 0.9;
  }

  .video-thumb .video-info small,
  .video-thumb .video-info p {
    transform: translateY(100%);
    opacity: 0;
    display: block;
    transition: 0.5s 0.2s;
    color: #ffffff;
    z-index: 2;
    position: relative;
  }

  .video-thumb .video-info small {
    color: #d9d9d9;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 1px;
    margin-top: 3px;
  }

  

  .video-thumb:hover .video-info small,
  .video-thumb:hover .video-info p {
    transform: translateY(0px);
    opacity: 1;
  }
  .video-thumb h4{
      
      size: 20px;
      line-height: 2;
  }
  .butn{
      cursor: pointer;
  }
</style>