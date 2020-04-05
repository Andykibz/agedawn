<template>
    <div>
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->

            <!-- site-navbar-wrap -->
        <div id="site-navbar-wrap" class="site-navbar-wrap">
            <div class="site-navbar-top">
                <div class="container py-3">
                <div class="row align-items-center">
                    <div class="col-6">
                    <a target="+_blank" :href="twitter" class="p-2 pl-0"><span class="icon-twitter"></span></a>
                    <a target="+_blank" :href="facebook" class="p-2 pl-0"><span class="icon-facebook"></span></a>
                    <a target="+_blank" :href="soundcloud" class="p-2 pl-0"><span class="icon-soundcloud"></span></a>
                    <a target="+_blank" :href="youtube" class="p-2 pl-0"><span class="icon-youtube"></span></a>
                    </div>
                    <div class="col-6">
                    <div class="d-flex ml-auto">
                        <a href="#" class="d-flex align-items-center ml-auto mr-4">
                        <span class="icon-phone mr-2"></span>
                        <span class="d-none d-md-inline-block">info@adawnage.com</span>
                        </a>
                        <a href="#" class="d-flex align-items-center">
                        <span class="icon-envelope mr-2"></span>
                        <span class="d-none d-md-inline-block">+1 291 2830 302</span>
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div id="navbar-wrap" class="site-navbar">
                <div class="container py-1">
                <div class="row align-items-center">
                    <div class="col-2">
                    <h2 class="mb-0 site-logo"><router-link :to="{name: 'home'}"> <img class="" src="/imgs/logo.png" alt=""> </router-link></h2>
                    </div>
                    <div class="col-10">
                    <nav class="site-navigation text-right" role="navigation">
                        <div class="container">
                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class=""><router-link :to="{name: 'about'}">About Us</router-link></li>
                            <li class=""><router-link :to="{name: 'news'}" >News</router-link></li>
                            <li class=""><router-link :to="{name: 'store'}">Store</router-link></li>
                            <!-- <li class=""><router-link :to="{name: 'media'}">Media</router-link></li> -->
                            <li class="">
                                <router-link class="dropdown-toggle" @click.prevent to="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span v-if="user"> {{ user.name.split(' ')[0] }} </span> 
                                    <i class="icon-user-circle"></i>
                                </router-link>
                                <div class="dropdown-menu bg-transparent">
                                    <template v-if="!!!authenticated">
                                        <router-link id="signInLink" class="nav-link dropdown-item" to=""
                                                type="button" data-toggle="modal" data-target="#signinModal"> 
                                                Sign In 
                                        </router-link>
                                        <router-link id="signUpLink" class="nav-link dropdown-item" to=""
                                                type="button" data-toggle="modal" data-target="#signupModal"> 
                                                Sign Up 
                                        </router-link>
                                        <div class="dropdown-divider"></div>
                                        
                                    </template>
                                    <template v-else-if="!!authenticated">
                                        <a @click.prevent="signOut" id="signOutLink" class="nav-link dropdown-item" to="#signout" type="button"> 
                                                Sign Out
                                        </a>
                                        <div class="dropdown-divider"></div>
                                    </template>
                                    <router-link @click.prevent class="nav-link dropdown-item" 
                                                data-toggle="modal" data-target="#cartModal" to=""> 
                                                <i class=""></i> 
                                                Cart 
                                    </router-link>
                                </div>
                            </li>
                        </ul>
                        </div>
                    </nav>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- End site-navbar-wrap -->
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
  export default{
        computed: {
            ...mapGetters({
                authenticated : 'auth/authenticated',
                user         : 'auth/user'
            })
        },

        data(){
            return{
            facebook      :   "https://web.facebook.com/pg/adawnage/",
            messenger     :   "https://m.me/adawnage?fbclid=IwAR3DwLdfP8tGkuqWhv4dhnmeF4-XLxEZKz0ewRHb3nR2Qr0hgLHT2BGOowY",
            twitter       :   "https://twitter.com/adawnage",
            email         :   "info@adawnage.com",
            youtube       :   "https://www.youtube.com/user/adawnageband",
            soundcloud     :   "https://soundcloud.com/adawnage"

            }
        },

        methods:{
            ...mapActions({
                signOutAction : 'auth/signOut'
            }),
            signOut(){
                this.signOutAction().then(()=>{
                    this.$router.replace({
                        name    : 'home'
                    });
                })
            }
        },
        beforeMount(){
            
        }
    
  }
</script>
<style lang="scss" scoped>
    .dropdown-menu a{
        color: rgba(255, 255, 255, 0.6);
        font-weight: 700;
    }
    .nav-link{
        &:hover{
            color:#333;
        }
    }
</style>