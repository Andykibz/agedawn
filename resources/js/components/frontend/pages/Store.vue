<template>
    <div>
        <Hero :heading="`What do we stock ?`" />

        <div class="container mt-5 mx-auto" data-aos="slide-up">
            <!-- <hr class="bg-secondary"> -->
            <div class="row d-flex justify-content-center">
                    <SubHero :heading="'Music and Merch'"/>
                <div class="col-lg-10 col-12">
                    <div class="row">
                    </div>
                    <div>
                        <span class="row">
                            <div class="col-12">
                                <hr class="hr-text mt-4 mb-4"  :data-content="'Music Albums'">
                            </div>
                        </span>
                        <div class="row d-flex justify-content-center">
                            <MerchItem v-for="music in music" :key="music.id" :item="music" v-bind:static="false"></MerchItem>
                        </div>
                    </div>
                    <div>
                        <span class="row">
                            <div class="col-12">
                                <hr class="hr-text mt-4 mb-4"  :data-content="'Hoodies'">
                            </div>
                        </span>
                        <div class="row">
                            <MerchItem v-for="hoodie in hoodies" :key="hoodie.id" :item="hoodie" v-bind:static="false"></MerchItem>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                
            </div>
        </div>
    </div>
</template>
<script>
import MerchItem from '../components/sub/merchitem'
import Carousel from 'vue-owl-carousel'
import Hero from '../components/hero'
import SubHero from '../components/subhero'
import { mapActions,mapGetters } from 'vuex';
export default {
    name            :   "Store",
    components      :   { MerchItem,Carousel, Hero, SubHero },
    computed :{
            ...mapGetters({
                    hoodies : 'shop/getHoodies',
                    music   : 'shop/getMusic',
            })
    },
    data(){
        return{
            
            
        }
    },
    methods:{
        ...mapActions({
            getByCategories : 'shop/getByCategories'
        })
        
    },
    mounted(){
        this.getByCategories('hoodies')
        this.getByCategories('music')

    },
    beforeMount(){

    }
}
</script>
