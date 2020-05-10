<template>
    <div id="" class="">   
        <div class="topfooter py-5">
            <div class="container">
                <div class="row d-flex align-content-center justify-content-center position-relative ">
                    <!-- <div class="col-3">
                        <label for="">Quick Links</label>
                        <ul>
                            <li> <router-link> </li>
                        </ul>
                    </div> -->
    
            
                            <div class="col-md-7 col-sm-11 col-12 footer-content pt-3">
                               <div class="d-flex flex-column  " data-aos="fade-up">
                                   <h5 class="text-light follow text-center">
                                       <span>Follow Us</span>
                                    </h5>
                                   <div class="socialIcons d-flex flex-row justify-content-around px-5">
                                        <a target="+_blank" style="font-size: 1.1em !important;" v-tooltip="'Follow on Facebook'" data-tooltip="Follow on Facebook" :href="facebook" class="p-2 pl-0" ><span  class="icon-facebook"></span></a>
                                        <a target="+_blank" style="font-size: 1.1em !important;" v-tooltip="'Follow on twitter'" :href="twitter" class="p-2 pl-0"><span class="icon-twitter"></span></a>
                                        <a target="+_blank" style="font-size: 1.1em !important;" v-tooltip="'Listen on Soundcloud'" :href="soundcloud" class="p-2 pl-0"><span class="icon-soundcloud"></span></a>
                                        <a target="+_blank" style="font-size: 1.1em !important;" v-tooltip="'Follow on Instagram'" :href="instagram" class="p-2 pl-0"><span class="icon-instagram"></span></a>
                                        <a target="+_blank" style="font-size: 1.1em !important;" v-tooltip="'Subscribe on YouTube'" :href="youtube" class="p-2 pl-0"><span class="icon-youtube"></span></a>
                                   </div>
                                </div>
                                <div class=" text-light" data-aos="fade-up">                                    
                                    <span class=" mb-1 d-flex justify-content-around footler-links">
                                        <a href="mailto:info@adawnage.com">info@adawnage.com</a>
                                        <a href="/">www.adawnage.com</a>
                                        
                                        <!-- <a href="tel:+254728778384"> +254 (0) 728 778 384</a> -->
                                    </span>
                                    <span class="mb-1 d-flex justify-content-around footler-links">
                                        <a href="tel:+254728778384"> +254 (0) 728 778 384</a>
                                    </span>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
    
        <div class="bottomfoot d-flex flex-row justify-content-between py-2 px-3">
            <div class="">
                <p class="text-muted"> Adawnage Band &copy; {{ year }}. All Rights Reserved </p>
            </div>
            <div class="flex-fill">
                <ul class="d-flex justify-content-end">
                    
                    <li><a class="text-muted" href="#">Privacy Policy</a></li>
                    <li><a class="text-muted" href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
    
</template>
<script>
import Social from './sub/social'
export default {
    name        :   "Footer",
    components  :   { Social },
    data(){
        return{
            year      : new Date().getFullYear(),
            about     :   `Adawnage is a fusion of three words A DAWN AGE, backed by Isaiah 43:19 - “Behold, I am doing a new thing; now it springs forth, do you not perceive it?"
                            Adawnage represents the dawning of a new age, a fresh start, which is what our music and lives are about. We are a unit of young and energetic individuals from different established professional backgrounds with one sole mission of reaching out to the world.`,
            facebook        :   "https://web.facebook.com/pg/adawnage/",
            twitter         :   "https://twitter.com/adawnage?lang=en  ",
            instagram       :   "https://www.instagram.com/adawnage/?hl=en",
            email           :   "info@adawnage.com",
            youtube         :   "https://www.youtube.com/channel/UC8w14pp6McD-PcRagO_1r7A",
            soundcloud      :   "https://soundcloud.com/adawnage",
        }
    }

}
</script>
<style lang="scss" scoped>
    h5.follow{
        border-bottom: 1px solid #f6993f;
        padding-bottom: .4em;
    }
  h5.follow::after {
        // content: '';
        // margin-top: -1em;        
        // display: block;
        // transform: translateX(-50%);
        // position: absolute;
        // z-index: 99;
        // bottom:0;
        // left: 50%;
        // height: 2px;
        // width: 100px;
        // background-color: #f6993f;
        
    }
    .footler-links{
        a{
            color: #d1d1cd;
            text-shadow: -3px 0px 7px rgba(99, 91, 80, 0.24);
            font-size: 1.4em;
        }
    }
    .socialIcons{
        a { color: #d1d1cd; }
        font-size:x-large;
        @media only screen and (max-width: 900px) {
            font-size:large;
        }

    }
    .topfooter{
        background-color: rgba(0,0,0,.4);
        
    }
    span.footer-about:first-child:first-letter{
        color: #903;
        float: left;
        font-size: 75px;
        line-height: 60px;
        padding-top: 4px;
        padding-right: 8px;
        padding-left: 3px;
    }
    .bottomfoot{
        background-color: rgba(10,8,0,.8);
        font-size: medium;
    }
    .bottomfoot p{
        margin-bottom: 0;

    }
    .bottomfoot ul, .bottom-nav{
        list-style-type: none;
        margin-bottom:0;
    }
    .bottomfoot ul li, .bottom-nav li{
        list-style-type: none;
        /* display: inline-block; */
        margin: 0 0px;
        border-left: 1px solid #444343;
        padding: 0 12px;
    }
    .bottomfoot ul li a,.bottom-nav li a{
        color: #d1d1cd;

    }
    .bottomfoot ul li:nth-child(1),.bottom-nav li:nth-child(1) {
        border: none;
    }
    .bottom-nav li a{
        color: #d1d1cd;
    }
</style>