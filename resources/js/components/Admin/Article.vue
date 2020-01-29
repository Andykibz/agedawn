<template>
    <div class="row">
        <div class="col-md-7 col-12">
            <ArticleForm></ArticleForm>
        </div>
        <div class="col-md-5 col-12">
            <ArticleList></ArticleList>
        </div>
        
    </div>
</template>
<script>
    import ArticleForm from './components/articleform'
    import ArticleList from './components/articlelist'
    export default {
        name        : "Articles",
        components  : { ArticleForm, ArticleList },
        data(){
            return{

            }
        },
        mounted() {
            
        }
    }
</script>
