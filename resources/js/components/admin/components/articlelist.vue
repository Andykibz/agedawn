<template>
    <div>
        <div class="d-flex flex-row justify-content-between ">
            <h4>Article List  </h4>
            <small class="d-flex align-items-center"> {{ current_page }} of {{ last_page }} </small>
        </div>

        <div id="artcile-list" class="mb-1">
            <div class="list-group">
                <a href="#" @click.prevent="edit(article.id)" class="list-group-item list-group-item-action" v-for="article in articles" :key="article.id">
                <button @click.prevent="delArticle($event,article.id)" class="btn btn-sm btn-outline-danger del-btn mr-2 mb-2">
                    <i class="fa fa-trash fa-1x"></i>
                </button>
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ article.title }}</h5>
                    <small><timeago :datetime="article.updated_at"></timeago></small>
                    </div>
                    <p class="mb-1">{{ article.headline }}</p>
                </a>
            </div>
        </div>

        <paginate :prevpage="prevpage" :nextpage="nextpage" />

    </div>
</template>

<script>
import paginate from './sub/paginate';
import { eventBus } from '../../../admin';
export default {
    name        :   "ArticleList",
    components  :   { paginate },
    data(){
        return{
            articles        :   [],
            current_page    :   '',
            next            :   '',
            prev            :   '',
            last_page       :   ''
        }
    },
    methods:{
        edit(id){
            // let id = Number(id)
            eventBus.$emit('articleedit', id )
        },
        nextpage(){
            if ( this.next != null ){
                axios.get(this.next)
                .then(response => { 
                        this.current_page   =   response.data.current_page
                        this.articles       =   response.data.data  
                        this.next           =   response.data.next_page_url,
                        this.prev           =   response.data.prev_page_url
                        this.last_page      =   response.data.last_page
                    })
                .catch( error => {  console.log(error) });
            }
        },
        prevpage(){
            if ( this.prev != null ){
                axios.get(this.prev)
                .then(response => { 
                        this.current_page   =   response.data.current_page
                        this.articles       =   response.data.data  
                        this.next           =   response.data.next_page_url,
                        this.prev           =   response.data.prev_page_url
                        this.last_page      =   response.data.last_page
                })
                .catch( error => {  console.log(error); });
            }
        },
        fetchArticles(page) {            
            self = this
            axios.get('/api/admin/articles?page='+page)
            .then(response => { 
                    this.current_page   =   response.data.current_page
                    this.articles       =   response.data.data  
                    this.next           =   response.data.next_page_url,
                    this.prev           =   response.data.prev_page_url
                    this.last_page      =   response.data.last_page
                })
            .catch( error => {  console.log(error); });
         
        },
        delArticle(event,id){
            event.stopPropagation();
            self = this
            axios.delete('/api/admin/article/'+id)
            .then(response => { 
                    console.log(self.current_page)
                    self.fetchArticles(self.current_page)
                })
            .catch( error => {  console.log(error); });
        }
    },
    beforeMount(){
        this.fetchArticles(1)         
    }

}
</script>

<style scoped>
.del-btn{
    position: absolute;
    right: 0;
    bottom: 0;
    

}

</style>