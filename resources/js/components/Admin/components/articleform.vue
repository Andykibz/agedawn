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
import TextInput from './inputs/text'
import TextAreaInput from './inputs/textarea'
import ImageFile from './inputs/imagefile'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { eventBus } from '../../../admin';
import { format } from 'path';
import { log } from 'util';
export default {
    name        :   "ArticleForm",
    components  :   { TextInput, TextAreaInput, ImageFile },
    data(){
        return{
            editor: ClassicEditor,
            editorConfig: {
            },
            formTitle   :   '',
            title       :   '',
            headline    :   '',
            body        :   '',
            image   :   '',
            ImageFile   :   '',
            errMsg      :   {   'title' : null,
                                'headline' : null,
                                'image' : null,
                                'body' : null,
                            },
            upadateID   :   null,
            
        }
    },
    methods:{
        clearForm(){
            this.upadateID = '';
            document.getElementById('articleForm').reset();
            this.body = '';
            this.imgsource = ''
            document.getElementById('custom-file-label').textContent = "Choose an Image"
        },
        changelabel(event){
            let filename = event.target.value.split('\\').pop()
            document.getElementById('custom-file-label').textContent = filename
            this.ImageFile = event.target.files[0]
        },

        handling(){
            if(editorData.lengh < 1){   
                this.body =   "The body is empty"
            }
        },

        submitArticle(){
            // console.log(form);
            let articleForm = new FormData();
            articleForm.set('title',this.title)
            articleForm.set('body',this.body)
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
                console.log(response.data);
            })
            .catch(function (err) {
                console.log(err.response.data.errors);
            });    
        }

    },
    mounted(){
        
        
    },
    created() {
        self = this
        eventBus.$on('articleedit', (id) => {
            // getarticle(id)
            let url = '/api/admin/article/'+id+'/edit';
            axios.get(url)
            .then(response => { 
                this.upadateID = response.data.id;
                this.title     =   response.data.title;
                this.image    =   (response.data.image) ?'/storage/Articles/'+response.data.image : '';
                this.headline =       response.data.headline;
                this.body     =   response.data.body
            })
            .catch( error => {  console.log(error); });
        });
    }

}
</script>

<style scoped>
    .ck-editor__editable {
        min-height: 300px;
    }
</style>