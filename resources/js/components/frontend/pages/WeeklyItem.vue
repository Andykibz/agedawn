<template>
    <div>
        <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(/imgs/cover_final.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">            <div class="container">
                <div class="align-items-end row text-center justify-content-center">
                <div class="col-md-8 mb-3">
                    <span class="sub-text">{{ created_date(weekly.created_at) }}</span>
                    <h1 v-text="weekly.title"></h1>
                </div>
                </div>
            </div>
        </div>  
        <div class="container mt-5">
            <div class="row mb-5">        
                <main class="col-8 mx-auto" >
                    <div class="imgwrapper d-flex justify-content-center" data-aos="slide-up">
                        <img class="img-fluid" src="/imgs/weekly.jpg" alt="">                      
                    </div>
                    <div v-if="weekly.tags" class="tagsWrapper ml-4">
                        <a v-for="tag in weekly.tags" :key="tag.id" class="tag-item mr-1" 
                            style="padding:2px 4px"> 
                            {{ tag.name }} 
                        </a>
                    </div>
                    <hr class="py-0">
                    <article class="article-body px-3 py-2 adg-shadow" data-aos="slide-up" v-html="weekly.body"></article>
                    <hr class="bg-secondary">
                    <section id="related">
                    </section>
                </main>
            </div>            
        </div>
    </div>
</template>

<script>
export default {
    name    : "NewsItem",
    props   : {

    },
    components  :{},
    data(){
        return{
            weekly     : {},
        }
    },
    computed:{

    },
    watch: {
        '$route': 'fetchData'
    },
    methods:{
        getPost( id ){
            self = this
            axios.get(`/api/weekly/${id}`)
                .then((response)=>{
                    self.weekly = response.data                                      
                }).catch((err)=>{
                    console.log(err.response.data)
                })
        },
        created_date( date ){
            let months = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec' ]
            let month   = months[new Date(date).getUTCMonth()]
            let year    = String( new Date(date).getUTCFullYear() ).replace('20',"'")
            return `${month} ${new Date(date).getUTCDate()} ${year}`
        },

    },
    mounted(){
       this.getPost(this.$route.params.id)
    },
}
</script>

<style scoped>
    h1{
        font-size: 36px;
        font-weight: 100;
        text-shadow: 1px 1px 2px #333;
    }
    .article-body{
        color: #fff;
        text-align: justify;
    }
    .tag-item{
        margin-right: 10px;
        border : 1px solid #333;
        color:aliceblue ;
        font-size: small;
        cursor: pointer;
    }
</style>