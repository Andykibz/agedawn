<template>
  <!-- <div class="position-relative">
    <div class="albums">
        <div v-swiper:mySwiper="swiperOptions">
          <div class="swiper-wrapper">
            <div class="swiper-slide" :key="album.id" v-for="album in albums">
                <div class="album-thumb">
                    <img :src="`/storage/Products/thumbs/${album.image}`" alt="" class="img-fluid">
                    <div class="album-info px-3">
                        <h3>{{ album.name }}</h3>
                        <p>Dramatically underwhelm efficient core competencies with quality ROI. Credibly iterate distinctive customer.</p>
                        <small class="text-warning">{{ album.price }}</small>
                    </div>
                </div>
              
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>    
    </div>
  </div> -->
<!--         
  <div v-swiper:mySwiper="swiperOptions">
    <div class="swiper-wrapper">
      <div class="swiper-slide" :key="album.id" v-for="album in albums">
        <a class="linkedWrapper" :href="'product/'+album.id" >
            <img :src="`/storage/Products/thumbs/${album.image}`" alt="" class="img-fluid">
            <div class="album-info px-3">
                <h3>{{ album.name }}</h3>
                <p>Dramatically underwhelm efficient core competencies with quality ROI. Credibly iterate distinctive customer.</p>
                <small class="text-warning">{{ album.price }}</small>
            </div>
        </a>          
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div> -->
    <div class="position-relative">
        <div class="albums">
          <swiper ref="mySwiper" :options="swiperOptions">
              <swiper-slide v-for="album in albums" :key="album.id" class="album mb-3">
                <div class="album-wrapper">
                    <figure class="mb-0">
                        <img :src="'/storage/Products/thumbs/'+album.image" :alt="`${album.name}_Image`" class="img-fluid d-block">
                    </figure>
                    <div class="px-3 album-info d-flex flex-column justify-content-center align-items-center">
                        <h3>{{ album.name }}</h3>
                        <p>Dramatically underwhelm efficient core competencies with quality ROI. Credibly iterate distinctive customer.</p>
                        <small class="text-warning">KES {{ album.price }}</small>
                    </div>
                </div>
              </swiper-slide>
              <div class="swiper-pagination" slot="pagination"></div>

          </swiper>

        </div>
        
    </div>
    <!-- </carousel> -->
</template>
<script>

import { mapGetters, mapActions } from 'vuex'
import carousel from 'vue-owl-carousel'

export default {
    name        :   "AlbumCard",
    // props       :   ['albums'],
    
    computed    :{
        ...mapGetters({
            albums      : 'shop/getMusic'
        })
    },
    data(){
        return{
            // albums : []
            swiperOptions: {
                effect: 'fade',
                autoplay: {
                      delay: 2500,
                      disableOnInteraction: false
                },
              // spaceBetween: 0,
              // direction: 'vertical',
              
            }
        }
    },
    methods:{
        ...mapActions({
            getProductsAction    :   'shop/getByCategories',
            addToCartAction : 'cart/addToCart'
        }),
        getAlbums(){
          self =  this
          axios.get('/api/category/music')
          .then((response)=>{
              self.albums = response.data[0]
              console.log(self.albums);
          })
        }
    },
    mounted(){
      // this.getAlbums()
      this.getProductsAction('music')
        
        
    },
    components  :   { carousel },
}
</script>
<style lang="scss" scoped>
  .album-info{
    position: absolute;
    bottom: 100%;
    left: 0;
    right: 0;
    overflow: hidden;
    width: 100%;
    height:0;
    transition: .2s ease;
    background-color: rgba($color: #000000, $alpha: .5);
    // text-align: justify;
    h3{
        font-family: 'Courier New', Courier, monospace;
        color: aliceblue;
        text-shadow: 1px 1px 2px 2px #333;
    }
    small{
      font-size: large;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
  }

  .album-wrapper{
    overflow: hidden;
    display:  block;

    img{
      display: block;
    }
    
    &:hover {
      .album-info{
        height: 100%;    
        bottom: 0;
      } 
    }
  } 
</style>