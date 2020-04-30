<template>
  <div>
        <div class="d-flex flex-row justify-content-between ">
            <h4 v-text="formTitle"></h4> 
            <button @click="clearForm()" class="btn btn-outline-secondary">New</button>
            <!-- <bu class="d-flex align-items-center"> 3 of 4 </small> -->
        </div>
        <form id="articleForm" @submit.prevent="submitArticle" action="POST" enctype="multipart/form-data" >
            <!-- <input type="hidden" name="_token" :value="csrf"> -->
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" v-model="title" 
                        class="form-control" id="" 
                        placeholder="Article's Title" required>
                <small class="form-text text-danger" v-text="errMsg['title'] || ''"></small>
            </div>  

            <div class="form-group">
                <label for=""> Tags </label>
                <div class="row">
                    <vue-tags-input class="col-md-8" v-model="tag" :tags="tags" :add-only-from-autocomplete="true"
                        :autocomplete-items="autocompleteItems" @tags-changed="newTags => tags = newTags"/>
                    <input class="col-md-3 border rounded-sm" style="font-size:small;" type="text" v-model="freshTag" placeholder="New Tag">
                    <i @click="AddFreshTag" style="border-radius:0px" class="btn btn-outline-info fa fa-plus ml-1"></i>
                    <small class="form-text text-danger" v-bind="errMsg['tagErr'] || ''"></small>
                </div>
                    
            </div>

            <div class="form-group">
                <label for="">Content Type</label>
                <select name="type" v-model="type" class="custom-select">
                    <option value="" disabled selected>Select content type</option>
                    <option value="article">Article</option>
                    <option value="weekly">Weeklies</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Headline</label>
                <textarea class="form-control" v-model="headline" placeholder="Enter Headline Here"></textarea>
                <small class="form-text text-danger" v-bind="errMsg['headline'] || ''"></small>
            </div>     
            <label for="">Choose an Image</label>
            <div class="custom-file">
                <div class="image-wrapper">
                    <img ref="file" :src="image" class="img-fluid img-thumbnail"/>
                </div>
                <input @change="changelabel($event)" type="file" class="custom-file-input" id="product-image"
                  aria-describedby="product-image">
                <label id="custom-file-label" class="custom-file-label" for="product-image">Choose file</label>
            </div>         

            

            <label for=""> Body </label>
            <ckeditor @change="handling" :editor="editor" v-model="body" :config="editorConfig"></ckeditor>
            <small class="form-text text-danger" v-text="errMsg['body']"></small>

            <button type="submit" class="mt-1 btn btn-primary">Submit</button>
        </form>
  </div>
</template>

<script>
import ImageFile from './inputs/imagefile'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { eventBus } from '../../../admin';
import VueTagsInput from '@johmun/vue-tags-input';
export default {
    name        :   "ArticleForm",
    components  :   { VueTagsInput, ImageFile },
    data(){
        return{
            // tagItems : [ 'dad','addsa' ],
            autocompleteItems: [],
            editor: ClassicEditor,
            freshTag    : null,
            editorConfig: {
            },
            formTitle   :   '',
            title       :   '',
            type        :   '',
            headline    :   '',
            body        :   '',
            image       :   '',
            ImageFile   :   '',
            errMsg      :   {   'title' : null,
                                'headline' : null,
                                'image' : null,
                                'body' : null,
                            },
            upadateID   :   null,
            tagErr      :   null,
            tag         :   '',
            tags        :   [],
            
        }
    },
    methods:{
        clearForm(){
            this.upadateID = '';
            document.getElementQuerySelector('#articleForm').reset();
            this.title = '';
            this.body = '';
            this.imgsource = ''
            this.tags= []
            this.headline = ''
            this.type = ''
            this.image = ''
            document.getElementById('custom-file-label').textContent = "Choose an Image"
        },
        changelabel(event){
            let filename = event.target.value.split('\\').pop()
            document.getElementById('custom-file-label').textContent = filename
            this.ImageFile = event.target.files[0]
        },
        formatTags( tags ){
            let TagsArr = []
            tags.forEach((item,index)=>{
                TagsArr.push({
                    'text'  : item.name,
                    'id'    : item.id,
                })
            })
            return TagsArr;

        },

        AddFreshTag(){
            axios.put( '/api/admin/createTag',{ name: this.freshTag } )
                .then((response)=>{
                    this.getTags();
                    this.freshTag = null;  
                })
                .catch((err)=>{
                    console.log(err.response.data);                    
                })
        },

        handling(){
            if(editorData.lengh < 1){   
                this.body =   "The body is empty"
            }
        },

        getTags(){
            axios.get('/api/admin/article/tags').then((response)=>{
                console.log(response.data);
                this.autocompleteItems = this.formatTags( response.data )
            }).catch((err)=>{
                console.log(err.response.data);                
            })
        },

        getTagIDs( tags ){
            let tagIDs = []
            tags.forEach((tag)=>{
                tagIDs.push( tag.id )
            })
            return tagIDs;
        },

        submitArticle(){
            // console.log(form);
            let articleForm = new FormData();
            articleForm.set('title',this.title)
            articleForm.set('type',this.type)
            articleForm.set('body',this.body)
            articleForm.set('tags',this.getTagIDs(this.tags))
            articleForm.set('headline',this.headline)
            if (this.ImageFile) { articleForm.append('image', this.ImageFile || null ) }

            let url = ''
            if( this.upadateID != null){ url = '/api/admin/article/'+this.upadateID }else
            if( this.upadateID == null ){ url = '/api/admin/article' }
            axios({
                method: 'post',
                url: url,
                data: articleForm,
                headers: {'Content-Type': 'multipart/form-data' }
            })
            .then(function (response) {
                
                this.clearForm()
            })
            .catch(function (err) {
                console.log(err.response.data);
            });    
        }

    },
    mounted(){
        this.getTags()
        
    },
    created() {
        self = this
        eventBus.$on('articleedit', (id) => {
            // getarticle(id)
            let url = '/api/admin/article/'+id+'/edit';
            axios.get(url)
            .then(response => { 
                this.upadateID  =   response.data.article.id;
                this.title      =   response.data.article.title;
                this.type       =   response.data.article.type;
                this.image      =   (response.data.image) ?'/storage/Articles/'+response.data.image : '';
                this.headline   =   response.data.article.headline;
                this.body       =   response.data.article.body;
                this.tags       =   this.formatTags( response.data.tags );
            })
            .catch( error => {  console.log(error); });
        });
    }

}
</script>

<style>
    .ti-input{
        width: 100%;
        border-radius: 4px;
    }
    .ck-editor__editable {
        min-height: 300px;
    }
</style>