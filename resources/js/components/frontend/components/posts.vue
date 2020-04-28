<template>
    <div class="section-wrapper py-3 mt-3">
        <div class="container">
            <div class="section_title text-center col-12 mb-3">
                <h2>What's News</h2>
                <span>
                    <p> Latest news, stories, events etc from Adawnage </p>
                </span>            
            </div>
            <div class="row d-flex justify-content-center">
                
                    <ArticleCard :articles="articles" class="col-md-7 col-12"/>
                    <!-- <WeeklyCard :weeklies="weeklies" class="col-md-5 col-12"/> -->
    
            </div>
        </div>
    </div>
</template>
<script>
import ArticleCard from './sub/articles'
import WeeklyCard from './sub/weeklies'
export default {
    name        :   "Posts",
    components  :   { ArticleCard, WeeklyCard, },
    data(){
        return{
            articles    :   [],
            weeklies    :   [],
        }
    },
    methods:{
        getPosts( ){
            self = this
            axios.get(`/api/homenews`)
            .then((response)=>{
                self.articles = response.data.articles;
                self.weeklies = response.data.weeklies;
            }).catch((err)=>{
                console.log( err.response.data.errors );
            })
        }
    },
    mounted(){
        this.getPosts()
    }
}
</script>

