<template>
    <div class="site-block-1">
      <div class="container">
        <div class="row">
          
          <div v-for="card in cards" v-bind:key="card.id" class="col-lg-4"
                data-aos="fade-down"
                data-aos-easing="linear">
            <a href="#" class="site-block-feature d-flex p-4 rounded mb-4">
              <div class="mr-3 text-secondary">
                <font-awesome-icon :icon="card['icon']" size="3x"/>
              </div>
              <div class="text">
                <h3>{{ card['title'] }}</h3>
                <p>{{ card['text'] }}</p>
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
                    'title' : "Gallery",
                    'icon'  : "photo-video",
                    'text'  : "Intrinsicly e-enable high-payoff resources after cross-unit."
                },{
                    'title' : "Shop",
                    'icon'  : "shopping-basket",
                    'text'  : "Credibly administrate reliable leadership client-focused."
                },
                {
                    'title' : "Events",
                    'icon'  : "calendar-week",
                    'text'  : "Progressively simplify high standards in web services."
                }
            ]
        }
    }
    
}
</script>