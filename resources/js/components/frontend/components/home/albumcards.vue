<template>
    <div class="">
        <div class="">
          <swiper ref="mySwiper" :options="swiperOptions">
              <swiper-slide v-for="album in albums" :key="album.id" class="album mb-3">
                <div class="person P-4" data-aos="zoom-in">
              <div class="bio-img">
                <figure>
                  <img :src="'/storage/Products/thumbs/'+album.image" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                    <router-link :to="'/product/'+album.id" role="button" class="btn btn-sm btn-outline-info">
                        <!-- <font-awesome-icon style="cursor:pointer;" icon="eye" class="text-primary"/> -->
                        View
                    </router-link>
                    <router-link @click.native.prevent="promptCart" to="" role="button" class="btn btn-sm btn-outline-danger">
                        Add to Cart
                    </router-link>
                </div>
              </div>
              <h2 class="text-light">{{ album.name }}</h2>
              <span class="sub-title">Ksh {{ album.price }}</span>
            </div>
              </swiper-slide>
              <div class="swiper-pagination" slot="pagination"></div>
          </swiper>
        </div>        
    </div>
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
                // effect: 'fade',
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
  .description{
    overflow: hidden;
     text-overflow: "...";

  /* Required for text-overflow to do anything */
  white-space: nowrap;
  }
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
        // font-family: 'Courier New', Courier, monospace;
        color: aliceblue;
        text-shadow: 1px 1px 2px 2px #333;
    }
    small{
      font-size: large;
      // font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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