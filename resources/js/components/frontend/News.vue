<template>
    <div>
        <div class="site-blocks-cover overlay inner-page" :style="{'background-image':'url(./imgs/drums.jpg)'}" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-end text-center justify-content-center">
                <div class="col-md-8 mb-4">
                    <span class="sub-text">Interior Design Company</span>
                    <h1>Experience Interior Design</h1>
                </div>
                </div>
            </div>
        </div>  
        <div class="container mt-5">
            <div class="section_title text-center col-12 mb-5"  data-aos="fade-in">
                <h2>News</h2>
                <p>What's going On</p>
            </div>
            <div class="row mb-5">
        
                <main class="col-8 mx-auto" >
                    <Paginate :current="current_page" :last="last_page" :getPage="getArtcles"/>
                    <!-- <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"> -->
                    <div v-for="article in articles" :key="article.id" class="" data-aos="slide-up">
                        <div class="row no-gutters  overflow-hidden rounded bg-dark flex-md-row mb-4 shadow-lg position-relative">
                            <div v-if="article.image" class="img-wrapper" :style="{'background-image':'url(./storage/Articles/'+article.image+')'}">
                            </div>
                            <div class=" p-4 d-flex flex-column position-static">
                                <h3 class="mb-0 text-light" v-text="'~ '+article.title">-</h3>
                                <div class="mb-1 text-muted">{{ created_date(article.created_at) }}</div>
                                <p v-if="article.headline" class="card-text mb-auto">{{ article.headline }}</p>
                                <router-link :to="{ name : 'newsitem', params: { id : article.id } }" class="stretched-link">Continue reading</router-link>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        
    </div>
</template>
<script>
import Paginate from './components/sub/paginate'
export default {
    name : "News",
    props : [''],
    components : { Paginate },
    data(){
        return{
            articles : [],
            current_page : null,
            last_page :  null,
        }
    },
    methods:{
        getArtcles( page = 1 ){
            self = this
            axios.get(`/api/news?page=${page}`)
            .then((response)=>{
                self.articles = response.data.data
                self.current_page = response.data.current_page
                self.last_page = response.data.last_page

                console.log( response.data.current_page );
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
    beforeMount(){
        this.getArtcles()
    },
    
}
</script>
<style scoped>
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
</style>
