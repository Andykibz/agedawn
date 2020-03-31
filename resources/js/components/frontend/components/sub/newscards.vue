<template>
    <div>
        <div v-for="article in articles" :key="article.id" class="article-item" data-aos="slide-up">

            <div class="row no-gutters  overflow-hidden rounded flex-md-row mb-4 shadow-lg position-relative">
                <div v-if="article.image" class="col-5 img-wrapper" :style="{'background-image':'url(./storage/Articles/thumbs/'+article.image+')'}">
                </div>
                <div class="col-7 p-4 d-flex flex-column position-static">
                    <h3 class="mb-0 text-light" v-text="'~ '+article.title">-</h3>
                    <div class="mb-1 text-muted">{{ created_date(article.created_at) }}</div>
                    <p v-if="article.headline" class="card-text mb-auto">{{ article.headline }}</p>
                    <router-link :to="{ name : 'newsitem', params: { id : article.id } }" class="stretched-link">Continue reading</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "NewsCard",
    data(){
        return{
            articles: []   
        }
    },
    methods:{
        created_date( date ){
            let months = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec' ]
            let month   = months[new Date(date).getUTCMonth()]
            let year    = String( new Date(date).getUTCFullYear() ).replace('20',"'")
            return `${month} ${new Date(date).getUTCDate()} ${year}`
        },
        getArticles( ){
            self = this
            axios.get(`/api/homenews`)
            .then((response)=>{
                self.articles = response.data
                console.log(self.articles);
                
            }).catch((err)=>{
                console.log( err.response.data.errors );
            })
        }
    },
    mounted(){
        this.articles = this.getArticles()
    }
}
</script>
<style scoped>
    .article-item{
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