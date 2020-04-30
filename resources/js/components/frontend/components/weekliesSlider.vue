<template>
    <div class="container mx-auto px-auto">
        <div class="weekliesWrapper d-flex justify-content-center">
            <div class="weeklies d-flex justify-content-between">
                <div class="weeklyList d-flex flex-column">
                    <div v-for="(weekly, index) in weeklies" :key="index" class="flex-fill">
                        <div v-if="index > 0" class="">
                            {{ weekly.title }}
                        </div>
                        <div v-else>
                            <label class="text-light">
                                No Weeklies
                            </label>
                        </div>
                    </div>
                </div>
                <div class="weekly-top">
                    <h4 class="text-center weekly-heading" v-text="weeklies[0].title"></h4>
                    <div class="weekly-excerpt text-justify" v-html="weeklies[0].headline">            
                    </div>
            
                    <router-link :to="{ name : 'weeklyitem', params: { id : weeklies[0].id } }" class="stretched-link readmore">Continue reading</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name        : "WeeklySlider",
    components  : {  },
    data(){
        return{
            weeklies    : []
        }
    },
    methods:{
        getWeeklies(){
            let self = this
            axios.get('/api/homeweeklies')
                .then((response)=>{                    
                    self.weeklies  = response.data
                    console.log(self.weeklies);
                    
                }).catch((err)=>{
                    console.log(err.response.data);                    
                })
                
        }
    },
    mounted(){
        this.getWeeklies()
    }
}
</script>

<style lang="scss">
    .weekliesWrapper{
        width: 100%;
        
    }
    .weeklies{
        width: 540px;
    }
    .weekly-top{
        .weekly-heading{
            color: aliceblue;
        }
        .weekly-excerpt{            
            color: #f2f1f2;
            font-weight: 200;
            line-height: 1.75;
            font-size: medium;
        
        }
    }

</style>