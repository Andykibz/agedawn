<template>
    <div class="section-wrapper py-3 mt-3">
        <div class="container">
            <div class="section_title text-center col-12 mb-3">
                <h2>What's News</h2>
                <p>Esteem spirit temper too say adieus who direct esteem. <br>
                    It esteems luckily or picture placing drawing. </p>
            </div>
            <div class="row d-flex justify-content-center">
                
                    <NewsCard class="col-8" ></NewsCard>
                
                    <!-- <EventCard/> -->
            </div>
        </div>
    </div>
</template>
<script>
import NewsCard from './sub/newscards'
import EventCard from './sub/eventcards'
export default {
    name        :   "NewsEvents",
    props       :   [],
    components  :   { NewsCard,EventCard, },
    data(){
        return{
            
        }
    },
    methods:{
        
    }
}
</script>
<style scoped>
    
    

</style>
