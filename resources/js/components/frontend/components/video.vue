<template>
    <div>

        <div class="container-fluid video-player">
        <div class="container">
            <div class="screen embed-responsive embed-responsive-16by9">
                <iframe id="screen" src="https://www.youtube.com/embed/YE7VzlLtp-4" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>

            <div class="play-list">
                <carousel>
                    <div>
                        <div class="card"> <img class="card-img link-img"
                                data-link="https://www.youtube.com/embed/ujPNSC4JllE" src="assets/images/play1.png"
                                alt="">
                        </div>
                    </div>
                    <div>
                        <div class="card"> <img class="card-img link-img"
                                data-link="https://www.youtube.com/embed/rMT8CffVFMk" src="assets/images/play2.png"
                                alt="">

                        </div>
                    </div>
                    <div>
                        <div class="card"> <img class="card-img link-img"
                                data-link="https://www.youtube.com/embed/bGC9f1Po6Q8" src="assets/images/play3.png"
                                alt="">

                        </div>
                    </div>
                    <div>
                        <div class="card"> <img class="card-img link-img"
                                data-link="https://www.youtube.com/embed/yHk_sypSiXU" src="assets/images/play4.png"
                                alt="">

                        </div>
                    </div>
                    <div>
                        <div class="card"> <img class="card-img link-img"
                                data-link="https://www.youtube.com/embed/7yoqm-kgKEk" src="assets/images/play5.png"
                                alt="">

                        </div>
                    </div>
                </carousel>
                </div>
            <hr>


        </div>
    </div>
    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'
var $ = require('jquery');
global.$ = $;
global.jQuery = $;
require('../../../yu2fvl')
export default {
    name        :   "VideoPlayer",
    props       :   [],
    components  :   { carousel, jQuery },
    data(){
        return{

        }
    },
    mounted(){
        jQuery(".play-1, .play-2").yu2fvl();
    }

}
</script>

<style lang="scss">
$Angeline_Vintage: "Angeline_Vintage";
$Montserrat-Bold: "Montserrat-Bold";
$Roboto-Regular: "Roboto-Regular";
$Roboto-Italic: "Roboto-Italic";
%cus-btn {
  background-color: #03133a;
  width: 200px;
  padding: 12px 0;
  color: #ffffff;
  font-family: $Montserrat-Bold;
  margin-top: 20px;
  border-radius: 0;
  &:hover {
    background: #ffffff;
    color: #03133a;
  }
}
.owl-carousel,
.owl-carousel .owl-item {
  -webkit-tap-highlight-color: transparent;
  position: relative;
}
.owl-carousel {
  display: none;
  width: 100%;
  z-index: 1;
}
.owl-carousel .owl-stage {
  position: relative;
  -ms-touch-action: pan-Y;
  touch-action: manipulation;
  -moz-backface-visibility: hidden;
}
.owl-carousel .owl-stage:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
.owl-carousel .owl-stage-outer {
  position: relative;
  overflow: hidden;
  -webkit-transform: translate3d(0, 0, 0);
}
.owl-carousel .owl-item,
.owl-carousel .owl-wrapper {
  backface-visibility: hidden;
  transform: translate3d(0, 0, 0);
  
}
.owl-carousel .owl-item {
  min-height: 1px;
  float: left;
  backface-visibility: hidden;
  -webkit-touch-callout: none;
}
.owl-carousel .owl-item img {
  display: block;
  width: 100%;
}
.owl-carousel .owl-dots.disabled,
.owl-carousel .owl-nav.disabled {
  display: none;
}
.no-js .owl-carousel,
.owl-carousel.owl-loaded {
  display: block;
}
.owl-carousel .owl-dot,
.owl-carousel .owl-nav .owl-next,
.owl-carousel .owl-nav .owl-prev {
  cursor: pointer;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.owl-carousel .owl-nav button.owl-next,
.owl-carousel .owl-nav button.owl-prev,
.owl-carousel button.owl-dot {
  background: 0 0;
  color: inherit;
  border: none;
  padding: 0 !important;
  font: inherit;
}
.owl-carousel.owl-loading {
  opacity: 0;
  display: block;
}
.owl-carousel.owl-hidden {
  opacity: 0;
}
.owl-carousel.owl-refresh .owl-item {
  visibility: hidden;
}
.owl-carousel.owl-drag .owl-item {
  -ms-touch-action: pan-y;
  touch-action: pan-y;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.owl-carousel.owl-grab {
  cursor: move;
  cursor: grab;
}
.owl-carousel.owl-rtl {
  direction: rtl;
}
.owl-carousel.owl-rtl .owl-item {
  float: right;
}
.owl-carousel .animated {
  animation-duration: 1s;
  animation-fill-mode: both;
}
.owl-carousel .owl-animated-in {
  z-index: 0;
}
.owl-carousel .owl-animated-out {
  z-index: 1;
}
.owl-carousel .fadeOut {
  animation-name: fadeOut;
}
@keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
.owl-height {
  transition: height 0.5s ease-in-out;
}
.owl-carousel .owl-item .owl-lazy {
  opacity: 0;
  transition: opacity 0.4s ease;
}
.owl-carousel .owl-item .owl-lazy:not([src]),
.owl-carousel .owl-item .owl-lazy[src^=""] {
  max-height: 0;
}
.owl-carousel .owl-item img.owl-lazy {
  transform-style: preserve-3d;
}
.owl-carousel .owl-video-wrapper {
  position: relative;
  height: 100%;
  background: #000;
}
.owl-carousel .owl-video-play-icon {
  position: absolute;
  height: 80px;
  width: 80px;
  left: 50%;
  top: 50%;
  margin-left: -40px;
  margin-top: -40px;
//   background: url('owl.video.play.png') no-repeat;
  cursor: pointer;
  z-index: 1;
  -webkit-backface-visibility: hidden;
  transition: transform 0.1s ease;
}
.owl-carousel .owl-video-play-icon:hover {
  -ms-transform: scale(1.3, 1.3);
  transform: scale(1.3, 1.3);
}
.owl-carousel .owl-video-playing .owl-video-play-icon,
.owl-carousel .owl-video-playing .owl-video-tn {
  display: none;
}
.owl-carousel .owl-video-tn {
  opacity: 0;
  height: 100%;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: contain;
  transition: opacity 0.4s ease;
}
.owl-carousel .owl-video-frame {
  position: relative;
  z-index: 1;
  height: 100%;
  width: 100%;
}

.video-player {
  padding: 40px 0;
  hr {
    background-color: rgb(51, 51, 51);
    margin-top: 100px;
  }
  .screen {
    max-height: 500px;
    width: 100%;
    height: 100%;
    iframe {
      width: 100%;
    }
  }

  .play-list {
    max-width: 900px;
    margin: 20px auto;
  }
  .owl-stage-outer {
    img {
      cursor: pointer;
    }
  }
  .owl-nav {
    margin-top: -75px;
    display: block !important;
    left: 0;
    right: 0;
    position: relative;
    .owl-prev,
    .owl-next {
      float: left;
      color: #ffffff !important;
      background: #03133a !important;
      border-radius: 3px;
      box-shadow: 0px 3px 9px 0px rgba(0, 0, 0, 0.48);
      width: 41px;
      height: 41px;
      margin-left: -20px;
      font-size: 12px !important;
    }
    .owl-next {
      right: 0;
      float: right;
      margin-right: -20px;
    }
  }
}

.light-bg {
  background: #f7f7f7;
}

.vr-gallery {
  p {
    font-size: 15px;
    color: #444444;
    small {
      font-size: 11px;
      color: #03133a;
      text-transform: uppercase;
      font-weight: 700;
      letter-spacing: 2px;
    }
  }
  .pd-md {
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    img {
      width: 100%;
    }
  }
  @media (max-width: 767px) {
    .col-md-4 {
      padding-left: 0 !important;
      padding-right: 0 !important;
      margin-left: 0 !important;
      margin-right: 0 !important;
    }
  }
  h3 {
    font-size: 18px;
    color: #333333;
    margin-top: 5px;
    margin-bottom: 20px;
  }
  .cus-pd {
    padding: 50px 55px 10px 55px;
  }
  .cus-pd2 {
    padding: 40px 45px 10px 45px;
  }
  .card {
    height: 100%;
    img {
      width: 100%;
    }

    .card-img-overlay {
      h5 {
        font-size: 22px;
        color: #ffffff;
      }
      &.opacity {
        background-color: rgba(0, 0, 0, 0.459);
      }
    }
  }
  %arrow {
    position: absolute;
    content: "";
    border: 20px solid transparent;
  }
  .cus-arrow-left {
    &::before {
      @extend %arrow;
      border-color: transparent #f7f7f7 transparent transparent;
      left: 0;
      margin-left: -40px;
      top: 20px;
    }

    @media (max-width: 991px) {
      padding-left: 15px;
      padding-right: 15px;
      &::before {
        border-width: 15px;
        border-color: transparent transparent #f7f7f7 transparent;

        margin-top: -50px;
        left: 50px;
      }
    }
  }
  .cus-arrow-up {
    &::before {
      @extend %arrow;
      border-width: 15px;
      border-color: transparent transparent #f7f7f7 transparent;

      margin-top: -70px;
      left: 20px;
    }
  }
  .contact-box {
    background: #f7f7f7;
    display: inline-block;
    max-width: 382px;
    padding: 40px 55px 40px 55px;
    position: absolute;
    left: 0;
    bottom: 0;
    &::after {
      position: absolute;
      content: "";
      border: 15px solid transparent;
      border-color: #03133a;
      right: 0;
      top: 0;
    }
  }
  a.btn {
    @extend %cus-btn;
    width: 225px;
    &:hover {
      background: #f7f7f7;
    }
  }
  .play-1 {
    position: absolute;
    left: 50%;
    top: 40%;
    transform: translate(-50%, -40%);
    & + h5 {
      position: absolute;
      left: 0;
      right: 0;
      top: 55%;

      transform: translateY(-55%);
    }
  }
}


</style>
