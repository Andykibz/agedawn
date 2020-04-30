<template>
    <div>
        <Hero :heading="`What's up, you ask ?`" />
        <div class="container mt-5">
            <SubHero :heading="'News'"/>
            <div class="row mb-5">
        
                <main class="col-md-8 col-12 mx-auto" >
                    <Paginate :current="current_page" :last="last_page" :getPage="getArticles"/>
                    <!-- <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"> -->
                    <div v-for="article in articles" :key="article.id" class="my-2" data-aos="slide-up">
                        <div class="row no-gutters  overflow-hidden rounded bg-dark flex-md-row mb-4 shadow-lg position-relative">
                            <div v-if="article.image" class="img-wrapper" :style="{'background-image':'url(./storage/Articles/'+article.image+')'}">
                            </div>
                            <div class=" py-3 px-5 d-flex flex-column position-static align-content-center">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h3 class="mb-0 text-light" v-text="'~ '+article.title">-</h3>
                                    <div class="mb-1 text-muted">{{ created_date(article.created_at) }}</div>
                                </div>
                                <p v-if="article.headline" class="card-text mb-auto">{{ article.headline }}</p>
                                <router-link :to="{ name : 'newsitem', params: { id : article.id } }" class="stretched-link readmore">Continue reading</router-link>
                            </div>
                        </div>
                    </div>

                    <Paginate :current="current_page" :last="last_page" :getPage="getArticles"/>
                </main>
            </div>
            
        </div>
        
    </div>
</template>
<script>
import Paginate from '../components/sub/paginate'
import Hero from '../components/hero'
import SubHero from '../components/subhero'
export default {
    name : "News",
    props : [''],
    components : { Paginate, Hero, SubHero },
    data(){
        return{
            articles : [],
            current_page    : null,
            last_page       : null,
        }
    },
    methods:{
        getArticles( page = 1 ){
            self = this
            axios.get(`/api/news?page=${page}`)
            .then((response)=>{
                self.articles = response.data.data;
                self.current_page = response.data.pagination.current_page;
                self.last_page = response.data.pagination.last_page;
                
            }).catch((err)=>{
                console.log( err.response.data.errors );
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
        this.getArticles()
    },
    
}
</script>
<style lang="scss" scoped>
    .img-wrapper{
        background-origin: content-box;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
        /* background-size: cover; */
        background-size: 100% auto;
        height: 250px;
        width: 100%;
    }
    .readmore{
        font-family: 'Times New Roman', Times, serif;
        color: rgba(#f6993f,0.8);
        font-size: medium;
        &:hover{
            color: rgba(#f6993f,1);
        }
    }
</style>
