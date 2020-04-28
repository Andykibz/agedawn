<template>
    <div>
        <!-- <h5 class="text-light text-center"> Weekly News </h5> -->
        <div v-for="weekly in weeklies" :key="weekly.id" class="weekly-item" data-aos="slide-up">
            <div class="row no-gutters  overflow-hidden rounded flex-md-row mb-4 shadow-lg position-relative">
                <div class="col-12 py-3 px-2 d-flex flex-column position-static">
                    <h4 class="mb-0 text-light" v-text="'~ '+weekly.title">-</h4>
                    <div class="mb-1 text-muted">{{ created_date(weekly.created_at) }}</div>
                    <!-- <p v-if="weekly.headline" class="card-text mb-auto">{{ weekly.headline }}</p> -->
                    <router-link :to="{ name : 'newsitem', params: { id : weekly.id } }" class="stretched-link">Continue reading</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name    : "Weeklies",
    props   : ['weeklies'],
    data(){
        return{
            
        }
    },
    methods:{
        created_date( date ){
            let months = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec' ]
            let month   = months[new Date(date).getUTCMonth()]
            let year    = String( new Date(date).getUTCFullYear() ).replace('20',"'")
            return `${month} ${new Date(date).getUTCDate()} ${year}`
        },
        
    },
    mounted(){
    }
}
</script>
<style scoped>
    .weekly-item{
        box-shadow: inset 2px 2px 2px 2px rgb(71, 70, 70);
         
        /* box-shadow: 5px 5px 5px 0px #707070, inset 4px 4px 15px 0px #707070, -12px 5px 26px -1px rgba(0,0,0,0); */
        background-color: rgba(29, 31, 31,.2)
    }
    .img-wrapper{
        background-origin: content-box;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
        background-size: cover;
        /* background-size: 100% auto; */
        height: 250px;
        width: 100%;
    }
</style>