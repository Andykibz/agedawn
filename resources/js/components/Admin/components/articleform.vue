<template>
  <div>
        <div class="d-flex flex-row justify-content-between ">
            <h4 v-text="formTitle"></h4> 
            <button class="btn btn-outline-secondary">New</button>
            <!-- <bu class="d-flex align-items-center"> 3 of 4 </small> -->
        </div>
        <form @submit.prevent="submitArticle" action="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_token" :value="csrf">
            <TextInput ref="tIn" :label="'Title'" :placeholder="'Enter title of the article here'"></TextInput>
            <TextAreaInput ref="taIn" :label="'Headline'" :placeholder="'Enter title of the article here'"/>
            <ImageFile ref="imIn" :label="'Choose an Image'" />
            <label for=""> Body </label>
            <ckeditor @change="handling" :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
            <small class="form-text text-danger" v-text="errBody"></small>

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
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            editor: ClassicEditor,
            editorConfig: {
                // The configuration of the rich-text editor.
            },
            formTitle   :   '',

            editorData: '',
            title       :   '',
            headline    :   '',
            imgsource   :   '',
            form        :   {},
            errBody      :   '',
            
        }
    },
    methods:{
        handling(){
            if(editorData.lengh < 1){   
                this.errBody =   "The body is empty"
            }
        },
        submitArticle(){
            // console.log(this.$refs.tIn.text);
            let form = {
                '_token'    :   this.token,
                'title'     :   this.$refs.tIn.textVal,
                'headline'  :   this.$refs.taIn.textAreaVal,
                'body'      :   this.editorData,
                'image'     :   this.$refs.imIn.files[0],

            };
            axios.post('/api/admin/article',form,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(response => { 
                console.log(response.data);
                            
            })
            .catch( error => {  console.log(error); });            
        }
    },
    mounted(){
        
        
    },
    created() {
        eventBus.$on('articleedit', (id) => {
            // getarticle(id)
            let url = '/api/admin/article/'+id+'/edit';
            
            axios.get(url)
            .then(response => { 
                this.$refs.tIn.textVal      =   response.data.title
                this.$refs.imIn.imgsource    =   '/storage/Articles/'+response.data.image+'_small.jpg'
                this.$refs.taIn.textAreaVal  =   response.data.headline
                this.editorData     =   response.data.body                
            })
            .catch( error => {  console.log(error); });
        });
    }

}
</script>

<style>
.ck-editor__editable {
    min-height: 300px;
}
</style>