<template>
    <div class="section-wrapper py-3 mt-3">
        <div class="container">
            <div class="section_title text-center col-12 mb-3">
                <h2>Posts and Weeklies</h2>
                <span>
                    <p> Latest news, stories, events etc from Adawnage </p>
                </span>            
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 col-12">
                    <div v-for="article in articles" :key="article.id" class="article-item" data-aos="slide-up">
                        <ArticleCard :article="article"/>
                    </div>
                </div>                
                <div class="col-md-5 col-12">
                    <div v-for="weekly in weeklies" :key="weekly.id" class="weekly-item" data-aos="slide-up">
                        <WeeklyCard :weekly="weekly" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import ArticleCard from './sub/articles'
import WeeklyCard from './sub/weeklies'
export default {
    name        :   "Posts",
    components  :   { ArticleCard, WeeklyCard },
    data(){
        return {
            articles    :   [],
            weeklies    :   [],
        }
    },
    methods:{
        getPosts( ){
            self = this
            axios.get(`/api/homenews`)
            .then((response)=>{
                self.articles = response.data.articles.data;
                self.weeklies = response.data.weeklies.data;
            }).catch((err)=>{
                console.log( err.response.data );
            })
        }
    },
    mounted(){
        this.getPosts()
    }
}
</script>

<style>
.tag-item{
    margin-right: 10px;
    border : 1px solid #333;
    color:aliceblue ;
    font-size: small;
    cursor: pointer;
}
</style>