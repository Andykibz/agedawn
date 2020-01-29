<template>
    <div class="col-sm-6 col-12 pl-2 ">
        <div class="row mb-3" v-for="event in events" :key="event.id" data-aos="fade-up-left">
            <div class="col-2"></div>
            <div class="col-10">
                    <div class="event-banner-thumb"><img class="img-thumbnail" :src="event.img" alt=""></div>    
                    <div class="d-flex flex-column">
                        <h4 class="text-secondary text-center">{{ event.name }}</h4>
                        <hr class="p-1 m-1">
                        <div class="event-meta d-flex flex-row justify-content-between">
                            <div class="">
                                <div class="">
                                    <span class="col-5 label"> <strong> <font-awesome-icon icon="map-marker-alt" /> </strong> </span>
                                    <span class="col-7 value"> {{ event.venue }} </span>                                    
                                </div>
                                <div class="">
                                    <span class=" col-5 label"> <strong > <font-awesome-icon icon="calendar-alt" /> </strong> </span>
                                    <span class="col-7 value"> {{ event.date }} </span>
                                </div>
                                <div class="">
                                    <span class=" col-5 label"> <strong > <font-awesome-icon icon="clock" /> </strong> </span>
                                    <span class="col-7 value"> {{ event.time }} </span>
                                </div>
                            </div>
                            <div class="vl"></div>
                            <div  class="d-flex flex-column justify-contentstart">
                                <div class="row">
                                    <span class=" col-4 label"> <strong > <font-awesome-icon icon="tags" /> </strong> </span>
                                    <span class="col-8 value"> {{ event.tags }} </span>
                                </div>
                                <div class="row">
                                    <span class=" col-4 label"> <strong > <font-awesome-icon icon="door-open" /> </strong> </span>
                                    <span class="col-8 value"> {{ event.entry }} </span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- end normal -->
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name        :   "EventsCard",
    data(){
        return{
            events  :[
                        {
                            "name"  :   "Mraruko Festival",
                            "img"   :   "storage/Events/thumbs/img_1.jpg",
                            "desc"  :   "Progressively negotiate highly efficient growth strategies for compelling outside the box thinking",
                            "venue" :   "Koshienda",
                            "date"  :   "29th Jan 2019",
                            "time"  :   "From 20:00Hrs",
                            "tags"  :   "Motivation, Hardwork",
                            "entry" :   "Free",
                        },
                        {
                            "name"  :   "Kuchapa Edition",
                            "img"   :   "storage/Events/thumbs/img_2.jpg",
                            "desc"  :   "Progressively negotiate highly efficient growth strategies for compelling outside the box thinking",
                            "venue" :   "Mfunyula",
                            "date"  :   "4th July 2020",
                            "time"  :   "From 12:00Hrs",
                            "tags"  :   "Prayerful, Joy",
                            "entry" :   "Free",
                        },                                
                    ]
        }
    }
}
</script>
<style scoped>
    .vl{
        display: block;
        margin: auto 1em;
        width: 1px;
        height: 100px;
        background-color: rgb(157, 160, 163);
        
    }
    .event-meta{
        width: 100%;
    }
    .event-banner-thumb{
        display: block;
        height: 20em;
    }
    .event-banner-thumb img{
        width: 100%;
        height: 100%;
    }
</style>