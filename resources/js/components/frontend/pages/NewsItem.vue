<template>
    <div>
        <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(/imgs/guitar.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">            <div class="container">
                
                <div class="align-items-end row text-center justify-content-center">
                <div class="col-md-8 mb-3">
                    <span class="sub-text">{{ created_date(article.created_at) }}</span>
                    <h1 v-text="article.title"></h1>
                </div>
                </div>
            </div>
        </div>  
        <div class="container mt-5">
            <div class="row mb-5">        
                <main class="col-8 mx-auto" >
                    <div v-if="article.image" class="imgwrapper">
                        <img class="img-fluid" :src="'/storage/Articles/'+article.image" alt="">                      
                    </div>
                    <hr>
                    <article data-aos="fade-in" v-html="article.body"></article>
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
    data(){
        return{
            article     : { }
        }
    },
    computed:{

    },
    watch: {
        '$route': 'fetchData'
    },
    methods:{
        getArticle( id ){
            self = this
            axios.get(`/api/news/${id}`)
                .then((response)=>{
                    self.article = response.data
                }).catch((err)=>{
    
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
       this.getArticle(this.$route.params.id)
    },
}
</script>

<style scoped>
    .site-blocks-cover{
        /* background-image: url('../imgs/guitar.jpg'); */
        background-image: url('/imgs/guitar.jpg')
    }
</style>