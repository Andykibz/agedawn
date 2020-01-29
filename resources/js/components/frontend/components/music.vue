<template>
    <section class="">
        <div class="container py-4">
            <div class="row">
                <div class="section_title text-center col-12 mb-3">
                    <h2>Our Music</h2>
                    <p>Esteem spirit temper too say adieus who direct esteem. <br>
                        It esteems luckily or picture placing drawing. </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-up-right">            
                    <iframe width="100%" height="450" scrolling="no" 
                        frameborder="no" allow="autoplay" 
                        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/18630862&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true">
                    </iframe>
                </div> 
                <div class="col-lg-6" data-aos="fade-up-left">
                    <div class="row">
                        <div v-for="video in videos" :key="video.id" class="col-sm-6 col-12 videothumb mb-3" >
                            <!-- <img :src="'https://i.ytimg.com/vi/'+video.url+'/mqdefault.jpg'" alt="" srcset=""> -->
                            <div class="video-thumb">
                                <a href="#" @click="popYoutube($event,video.url)"
                                    class="vid youtube"
                                    
                                    :ytSrc="video.url">
                                    <img :src="'https://i.ytimg.com/vi/'+video.url+'/mqdefault.jpg'" alt="" class="img-fluid img-thumbnail">
                                    <div class="video-info">
                                        <p><font-awesome-icon class="text-muted" :icon="['fas','play-circle']" size="3x"/></p>
                                        <!-- <p>Dramatically underwhelm efficient core competencies with quality ROI. Credibly iterate distinctive customer.</p> -->
                                    </div>
                                </a>
                                <h4 class="text-muted">{{ video.title }}</h4>
                            </div>
                            <!-- <div @click="popYoutube($event,video.url)"
                                class="vid youtube"
                                :style="{'background-image':'url(https://i.ytimg.com/vi/'+video.url+'/mqdefault.jpg)'}"
                                :ytSrc="video.url">
                                <font-awesome-icon :icon="['fas','play']" size="3x"/>
                            </div> -->
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
    name: "MusicFeature",
    data(){
        return{
            videos : [
                {
                    "title"         :   "Naomba",
                    "url"           :   "w0tC60eRFhg",
                    "description"   :   "NAOMBA is a prayer asking The Potter to make us and mould us so that we may become more like Him; to hide us in His arms and make us His worthy vessels."
                },
                {
                    "title"         :   "I Live For You",
                    "url"           :   "RKGo_xNMpwM",
                    "description"   :   "I Live For You is a track off Adawnage Band's MAISHA video which was released in 2016. The track is a declaration to live for God no matter the challenges we face in life."
                },
                {
                    "title"         :   "Tulizo",
                    "url"           :   "m09DhQmc63Y",
                    "description"   :   "Tulizo is a track off Adawnage Band's MAISHA video which was released in 2016. The track emphasizes how in this life nothing and no one can and will satisfy like Jesus can."
                },
                {
                    "title"         :   "Uwezo",
                    "url"           :   "fv75qkXRGBE",
                    "description"   :   "UWEZO is a prayer asking God to give us strength to stand on His word amidst all the betrayal and pain that we face. Speak these words into your life that God may give you the strength and determination to walk this Christian journey."
                },
                
            ]
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
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }
  .butn{
      cursor: pointer;
  }
</style>