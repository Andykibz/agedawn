<template>
    <div>
        <div class="site-blocks-cover overlay inner-page" 
            :style="{'background-image':'url(/imgs/cover_final.jpg)'}" 
            data-aos="fade" >
            <div class="container">                
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
                <main class="col-sm-12 col-lg-8 mx-auto" >
                    <div v-if="article.image" class="imgwrapper d-flex justify-content-center" data-aos="fade-in">
                        <img class="img-fluid" :src="'/storage/Articles/'+article.image" alt="">                      
                    </div>
                    <hr class="py-0">
                    <article class="article-body px-3 py-2 adg-shadow" data-aos="slide-up" v-html="article.body"></article>
                    
                    <hr class="bg-secondary">

                    <section id="comments">
                        
                        <Comments :article="article" :comments="comments.data" :query="getArticle" />

                    </section>
                </main>
            </div>            
        </div>
    </div>
</template>

<script>
import Comments from '../components/comments'
export default {
    name    : "NewsItem",
    props   : {

    },
    components  :{ Comments },
    data(){
        return{
            article     : {},
            comments    : [],
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
                    self.article = response.data.article
                    self.comments = response.data.comments
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
       this.getArticle(this.$route.params.id)
    },
}
</script>

<style scoped>
    .site-blocks-cover{
        /* background-image: url('../imgs/guitar.jpg'); */
        background-origin: content-box;
        background-position: center;
        
    }
    h1{
        font-size: 36px;
        font-weight: 100;
        text-shadow: 1px 1px 2px #333;
    }
    .article-body{
        font-size: 1.2rem;
        line-height: 1.8;
        color: #fff;
        text-align: justify;
    }
</style>

<style lang="scss" scoped>

</style>