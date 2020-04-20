<template>
    <div class="site-block-1">
      <div class="container">
        <div class="row">
          
          <div v-for="card in cards" v-bind:key="card.id" class="col-lg-4"
                data-aos="fade-down"
                data-aos-easing="linear">
            <a :href="card['link']" class="site-block-feature d-flex p-4 rounded mb-4">
              <div class="mr-3 text-secondary">
                <font-awesome-icon :icon="card['icon']" size="3x"/>
              </div>
              <div class="text">
                <h3>{{ card['title'] }}</h3>
                <p class="text-muted">{{ card['text'] }}</p>
              </div>
            </a>   
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    data() {return {
            cards : [
                {
                    'title' : "About Us",
                    'icon'  : "photo-video",
                    'text'  : "Bio, members & officials, Discogaphy and Accolades",
                    'link'  : 'about-us'
                },{
                    'title' : "Store",
                    'icon'  : "shopping-basket",
                    'text'  : "Checkout our Music and Merch up for sale",
                    'link'  : 'store'
                },
                {
                    'title' : "News",
                    'icon'  : "calendar-week",
                    'text'  : "Have a look at what's new with the Adawnage Band",
                    'link'  : 'news'
                }
            ]
        }
    }
    
}
</script>
<style scoped>
.text h3{
   font-size: medium;
}
</style>