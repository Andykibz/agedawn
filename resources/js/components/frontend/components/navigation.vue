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
        <div  class="site-navbar-wrap">
            <div class="site-navbar-top">
                <div class="container py-3">
                <div class="row align-items-center">
                    <div class="col-6">
                    <a href="#" class="p-2 pl-0"><span class="icon-twitter"></span></a>
                    <a href="#" class="p-2 pl-0"><span class="icon-facebook"></span></a>
                    <a href="#" class="p-2 pl-0"><span class="icon-linkedin"></span></a>
                    <a href="#" class="p-2 pl-0"><span class="icon-instagram"></span></a>
                    </div>
                    <div class="col-6">
                    <div class="d-flex ml-auto">
                        <a href="#" class="d-flex align-items-center ml-auto mr-4">
                        <span class="icon-phone mr-2"></span>
                        <span class="d-none d-md-inline-block">youremail@domain.com</span>
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
                            <!-- <li class="has-children">
                                <a href="projects.html">Projects</a>
                                <ul class="dropdown arrow-top">
                                    <li><a href="#">Menu One</a></li>
                                    <li><a href="#">Menu Two</a></li>
                                    <li><a href="#">Menu Three</a></li>
                                </ul>
                            </li> -->
                            <li><router-link :to="{name: 'about'}">About Us</router-link></li>
                            <li><router-link :to="{name: 'news'}" >News</router-link></li>
                            <li><router-link :to="{name: 'store'}">Store</router-link></li>
                            <li><router-link :to="{name: 'media'}">Media</router-link></li>
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
  export default{
      data(){
          return{

          }
      },
      beforeMount(){
          
      }
    
  }
</script>