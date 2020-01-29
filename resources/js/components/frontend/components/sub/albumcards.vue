<template>
        <!-- <carousel :autoplay="true" :nav="false" :items="1" > -->
    <div class="position-relative">
        <div style="z-index:2" class="position-absolute d-flex flex-column">
          <font-awesome-icon class="prev_alb" style="cursor:pointer;" :icon="['fas','arrow-alt-circle-up']" />
          <font-awesome-icon class="next_alb" style="cursor:pointer;" :icon="['fas','arrow-alt-circle-down']" />
        </div>
        <div class="albums">
            <div v-for="album in albums" :key="album.id" class="album mb-3">
                <div class="album-thumb">
                    <a href="#" >
                        <img :src="album.img" alt="" class="img-fluid">
                        <div class="album-info">
                            <h3>{{ album.title }}</h3>
                            <p>Dramatically underwhelm efficient core competencies with quality ROI. Credibly iterate distinctive customer.</p>
                            <small>{{ album.price }}</small>
                        </div>
                    </a>
                    <!-- <span class="prev"> <font-awesome-icon icon="arrow-alt-circle-up"/> </span> -->
                    <!-- <span class="next"> <font-awseome-icon icon="arrow-alt-circle-down"/> </span> -->
          
                </div>

            </div>
<span><button class="butn butn-orange butn-border-o">Carrot</button></span>
        </div>
    </div>
    <!-- </carousel> -->
</template>
<script>

import carousel from 'vue-owl-carousel'

export default {
    name        :   "AlbumCard",
    props       :   [''],
    components  :   { carousel },
    data(){
        return{
            "albums" : [
                {
                    "title"      :   "Safari",
                    "img"       :   "storage/Shop/Music/safari.jpg",
                    "price"     :   "Kes 500",
                },{
                    "title"      :   "Maisha",
                    "img"       :   "storage/Shop/Music/maisha.jpg",
                    "price"     :   "Kes 500",
                }
            ]
        }
    }
}
</script>
<style scoped>
    .album-info img {
    width: 100%;
    border-radius: 100%;
  }

  #album .album-thumb {
    overflow: hidden;
    position: relative;
    cursor: pointer;
    border-radius: 3px;
  }

  .album-thumb .album-info {
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

  .album-thumb .album-info:after {
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

  .album-thumb .album-info:hover::after {
    opacity: 0.9;
  }

  .album-thumb .album-info h3,
  .album-thumb .album-info small,
  .album-thumb .album-info p {
    transform: translateY(100%);
    opacity: 0;
    display: block;
    transition: 0.5s 0.2s;
    color: #ffffff;
    z-index: 2;
    position: relative;
  }

  .album-thumb .album-info small {
    color: #d9d9d9;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 1px;
    margin-top: 3px;
  }

  

  .album-thumb:hover .album-info h3,
  .album-thumb:hover .album-info small,
  .album-thumb:hover .album-info p {
    transform: translateY(0px);
    opacity: 1;
  }

</style>