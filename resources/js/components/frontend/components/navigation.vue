<template>
    <div>
        <v-dialog/>
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
                <div class="container py-2">
                <div class="row align-items-center">
                    <div class="col-6">
                        <a target="+_blank" style="font-size: 1.1em !important;" :href="facebook" class="p-2 pl-0"><span class="icon-facebook"></span></a>
                        <a target="+_blank" style="font-size: 1.1em !important;" :href="twitter" class="p-2 pl-0"><span class="icon-twitter"></span></a>
                        <a target="+_blank" style="font-size: 1.1em !important;" :href="instagram" class="p-2 pl-0"><span class="icon-instagram"></span></a>
                        <a target="+_blank" style="font-size: 1.1em !important;" :href="soundcloud" class="p-2 pl-0"><span class="icon-soundcloud"></span></a>
                        <a target="+_blank" style="font-size: 1.1em !important;" :href="youtube" class="p-2 pl-0"><span class="icon-youtube"></span></a>
                    </div>
                    <div class="col-6">
                    <div class="d-flex ml-auto">
                        <a href="#" class="d-flex align-items-center ml-auto mr-4">
                        <span class="icon-envelope mr-2"></span>
                        <span class="d-none d-md-inline-block"  style="font-size: .85em !important;">info@adawnage.com</span>
                        </a>
                        <a href="#" class="d-flex align-items-center">
                        <span class="icon-phone mr-2"></span>
                        <span class="d-none d-md-inline-block" style="font-size: .85em !important;">+254 (0) 728 778 384</span>
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
                    <h2 class="mb-0 site-logo"><router-link :to="{name: 'home'}"> <img class="" src="/imgs/adawnagelogo_sm.png" alt=""> </router-link></h2>
                    </div>
                    <div class="col-10">
                    <nav class="site-navigation text-right" role="navigation">
                        <div class="container">
                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class=""><router-link :to="{name: 'about'}">About Us</router-link></li>
                            <li class=""><router-link :to="{name: 'news'}" >News</router-link></li>
                            <li class=""><router-link :to="{name: 'store'}">Store</router-link></li>
                            <li class=""><router-link :to="{name: 'reachus'}">Reach Us</router-link></li>
                            <li style="" class="">
                                <router-link @click.prevent class="cart-link d-inline" 
                                    data-toggle="modal" data-target="#cartModal" to="#cart"> 
                                    Cart
                                    <span class="badge-cus mr-1 ">
                                        <i class=""> {{ nums }} </i>
                                    </span>
                                    
                                    <i class="icon-shopping_cart"></i> 
                                </router-link>
                            </li>
                            <!-- <li class=""><router-link :to="{name: 'media'}">Media</router-link></li> -->
                            <li class="text-sm-light text-md-success">
                                <router-link class="dropdown-toggle d-flex justify-content-start align-items-center" @click.prevent to="#user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    
                                    <span v-if="user"> {{ user.name.split(' ')[0] }} </span>
                                    <span class="mr-1" v-else> User </span>
                                    <i v-if="!user" class="icon-user-circle"></i>
                                </router-link>
                                <div class="dropdown-menu bg-transparent">
                                    <template v-if="!!!authenticated">
                                        
                                        <a role="button" id="signInLink" class="nav-link dropdown-item" to="#signin"
                                            data-toggle="modal" data-target="#signinModal" @click.prevent >
                                                Sign In 
                                        </a>
                                        <a role="button" id="signUpLink" class="nav-link dropdown-item" href="#signup" type="button"
                                                data-toggle="modal" data-target="#signupModal" @click.prevent >
                                                Sign Up 
                                        </a>                                        
                                    </template>
                                    <template v-else-if="!!authenticated">
                                        <a id="signOutLink" class="nav-link dropdown-item" 
                                            href="#SignOut" role="button" data-toggle="modal" data-target="#signOutModal" @click.prevent >
                                                Sign Out
                                        </a>
                                    </template>
                                    
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
import SignIn from './sub/signin'
import SignUp from './sub/signup'
  export default{
        computed: {
            ...mapGetters({
                authenticated   :   'auth/authenticated',
                user            :   'auth/user',
                nums            :   'cart/getCartItemNums'
            })
        },

        data(){
            return{
                facebook        :   "https://web.facebook.com/pg/adawnage/",
                messenger       :   "https://m.me/adawnage?fbclid=IwAR3DwLdfP8tGkuqWhv4dhnmeF4-XLxEZKz0ewRHb3nR2Qr0hgLHT2BGOowY",
                twitter         :   "https://twitter.com/adawnage?lang=en  ",
                email           :   "info@adawnage.com",
                youtube         :   "https://www.youtube.com/channel/UC8w14pp6McD-PcRagO_1r7A",
                soundcloud      :   "https://soundcloud.com/adawnage",
                instagram       :   "https://www.instagram.com/adawnage/?hl=en"
            }
        },

        methods:{
            ...mapActions({
                signOutAction : 'auth/signOut'
            }),
            promptSignOut(){
                let res = confirm(`Sign Out ${this.user.name} !`)
                if (res){
                    this.signOutAction()
                }
                
            },
            signOut(){
                this.signOutAction().then(()=>{
                    this.$router.replace({
                        name    : 'home'
                    });
                })
            },
            signIN(){
                
                this.$modal.show(SignIn, {
                    text: 'This text is passed as a property'
                }, {
                    height: 'auto'
                }, {
                    'before-close': (event) => { console.log('this will be called before the modal closes'); }
                })
            },

            signUP(){
                this.$modal.show(SignUp, {
                    text: 'This text is passed as a property'
                }, {
                    height: 'auto'
                }, {
                    'before-close': (event) => { console.log('this will be called before the modal closes'); }
                })
            }
        },
        mounted(){


        },
        beforeMount(){
            
        }
    
  }
//   if( document.getElementById('signOutLink') ){
// }
</script>
<style lang="scss" scoped>
    .dropdown-menu a{
        color: rgba(255, 255, 255, 0.6);
        font-weight: 700;
        &:hover{
            z-index: 33;
            cursor: pointer;
        }
        @media only screen and (max-width : 991px) {
            z-index: 9999;
            color: #333;
            &:hover{
                background-color: #ccc;
            }
        }
    }
    
    .nav-link{
        &:hover{
            color:#333 !important;
        }
    }
    
    .router-link-exact-active{   color: white !important;   }
    @media only screen and (max-width: 991px) {
        .router-link-exact-active{
            color: #98ccd3 !important;
        }
    }
    
    .cart-link{
        position: relative;
        // color: rgba($color: #ffffff, $alpha: .6) !important;
            line-height: 1.7;
        &:hover{
            color: rgba($color: #ffffff, $alpha: 1) !important;
            .badge-cus{
                color: #ffffff !important;
            }
        }
        .badge-cus{
            position: absolute;
            right: 0;
            top: -5px;
            display: flex;
            justify-content: flex-center;
            align-items: center;
            text-align: center;
            align-content: center;


            z-index: 9;
            
            min-width: 1em;
            height: 1em;
            border-radius: 50%;
            border: 1px rgba(152, 204, 211, 0.288) solid;
            background: rgba(152, 204, 211,.288);
            padding: 1px;
            i{
                font-size: 9px;
                display: inline-block;
                text-align: center;
            
            }
        }
        
    }
    .dropdown-menu{
          box-shadow: 0 8px 6px -6px black;

    }
</style>