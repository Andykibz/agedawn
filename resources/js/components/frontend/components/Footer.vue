<template>
    <div id="" class="">   
        <div class="topfooter py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <h5 class="text-light">Adawnage Band</h5>
                        <img src="imgs/logo.png" alt="">
                        <span class="text-muted footer-about" v-html="about"></span>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                               <Social/>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="d-flex flex-column text-light mb-3">
                                    <h6 class="text-muted">Booking Agent</h6>
                                    <div>
                                    </div>
                                    <span class="pl-2 mb-1">Grace Nduku</span>
                                    <span class="pl-2 mb-1"> <font-awesome-icon class="mr-2" icon="envelope"/> nduku.wambua@adawnage.com </span>
                                    <span class="pl-2 mb-1"> <font-awesome-icon class="mr-2" icon="mobile-alt"/> +254 (0) 792 718 750 </span>
                                </div>
                                <div class="d-flex flex-column text-light">
                                    <h6 class="text-muted"> Reach us at <font-awesome-icon icon="paper-plane"/></h6>
                                    
                                    <span class="pl-2 mb-1"><a href="mailto:info@adawnage.com">info@adawnage.com</a></span>                                    
                                </div>
                            </div>
                                
                            </div>
                            <div class="row">
                                <ul class="bottom-nav col-12 d-flex flex-row text-light">
                                    <li><router-link :to="{name: 'about'}">About Us</router-link></li>
                                    <li><router-link :to="{name: 'news'}">News</router-link></li>
                                    <li><router-link :to="{name: 'store'}">Store</router-link></li>
                                    <li><router-link :to="{name: 'media'}">Media</router-link></li>
                                </ul>
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
                    <li><a class="text-muted" href="#">Company Information</a></li>
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
            'year'      : new Date().getFullYear(),
            "about"     :   `Adawnage is a fusion of three words A DAWN AGE, backed by Isaiah 43:19 - “Behold, I am doing a new thing; now it springs forth, do you not perceive it?"
                            Adawnage represents the dawning of a new age, a fresh start, which is what our music and lives are about. We are a unit of young and energetic individuals from different established professional backgrounds with one sole mission of reaching out to the world.`,
        }
    }

}
</script>
<style scoped>
    .topfooter{
        background-color: rgba(0,0,0,.4);
        
    }
    span.footer-about:first-child:first-letter{
        color: #903;
        float: left;
        font-family: Georgia;
        font-size: 75px;
        line-height: 60px;
        padding-top: 4px;
        padding-right: 8px;
        padding-left: 3px;
    }
    .bottomfoot{
        background-color: rgba(10,8,0,.8);
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
        color: #908F8F;
        font-size:13px;
    }
    .bottomfoot ul li:nth-child(1),.bottom-nav li:nth-child(1) {
        border: none;
    }
    .bottom-nav li a{
        color: aliceblue;
        font-size: 1.1em;
    }
</style>