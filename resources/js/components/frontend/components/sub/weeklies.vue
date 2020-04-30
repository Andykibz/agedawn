<template>
        
    <div class="row no-gutters  overflow-hidden rounded flex-md-row mb-3 shadow-lg position-relative">
        <div class="col-12 pt-3 px-2 d-flex flex-column position-static">
            <h4 class="mb-1 text-light" v-text="'~ '+weekly.title">-</h4>
                <font-awesome-icon class="position-absolute text-info" style="right:1em;" icon="calendar-week"/>
            <div class="metas pl-3">
                <div class="d-dlex justify-content-center">
                    <!-- <font-awesome-icon icon="tag" size="1x" /> -->
                    <div v-if="weekly.tags" class="tagsWrapper">
                        <a v-for="tag in weekly.tags" :key="tag.id" class="tag-item mr-1" 
                            style="padding:2px 4px"> 
                            {{ tag.name }} 
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <router-link :to="{ name : 'weeklyitem', params: { id : weekly.id } }" class="pl-3 stretched-link readmore">Continue reading</router-link>
                    <div class="pl-3 mb-1 text-muted">{{ created_date(weekly.created_at) }}</div>
                
            </div>
            <!-- <div class="pl-3 mb-1 text-muted">{{ created_date(weekly.created_at) }}</div> -->
            <!-- <p v-if="weekly.headline" class="card-text mb-auto">{{ weekly.headline }}</p> -->
        </div>
    </div>
</template>
<script>
export default {
    name    : "Weeklies",
    props   : ['weekly'],
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