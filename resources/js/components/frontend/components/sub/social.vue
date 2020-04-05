<template>
    <div>
         <h5 class="text-light">
            Social Media Outlets
        </h5>
<!-- <hr class="hr-text" data-content="sdas"> -->
    <ul class="social-outlets">
        <li class="d-flex flex-row mb-3">
            <span>
                <font-awesome-icon style="width:1.8em" class="mr-1" :icon="['fab','facebook-f']"/>
                <a target="_blank" class="text-muted" :href="facebook">Like on Facebook </a>
                
            </span>
        </li>
        <li class="d-flex flex-row mb-3">
            <span>
                <font-awesome-icon style="width:1.8em" class="mr-1" :icon="['fab','soundcloud']"/>
                <a target="_blank" class="text-muted" :href="soundcloud">Listen on Soundcloud</a>
            </span>
        </li>
        <li class="d-flex flex-row mb-3">
            <span>
                <font-awesome-icon style="width:1.8em" class="mr-1" :icon="['fab','youtube']"/>
                <a target="_blank" class="text-muted" :href="youtube">View on Youtube</a>
            </span>
        </li>
        <li class="d-flex flex-row mb-3">
            <span>
                <font-awesome-icon style="width:1.8em" class="mr-1" :icon="['fab','twitter']"/>
                <a target="_blank" class="text-muted" :href="twitter">Follow on Twitter</a>
            </span>
        </li>
        <!-- <li class="d-flex flex-row">
            <span>
                <font-awesome-icon style="width:1.8em" class="mr-1" :icon="['fas','envelope']"/>
                <a class="text-muted" href="#"> {{ email }} </a>
            </span>
        </li> -->
        
    </ul>
    </div>
</template>
<script>
export default {
    name    :   "Social",
    data(){
        return{
            "facebook"      :   "https://web.facebook.com/pg/adawnage/",
            "messenger"     :   "https://m.me/adawnage?fbclid=IwAR3DwLdfP8tGkuqWhv4dhnmeF4-XLxEZKz0ewRHb3nR2Qr0hgLHT2BGOowY",
            "twitter"       :   "https://twitter.com/adawnage",
            "email"         :   "info@adawnage.com",
            "youtube"       :   "https://www.youtube.com/user/adawnageband",
            "soundcloud"     :   "https://soundcloud.com/adawnage"
        }
    }
}
</script>
<style scoped>
    .social-outlets{
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .social-outlets li span{
        width: 100%;
        /* text-align: center; */
    }
</style>