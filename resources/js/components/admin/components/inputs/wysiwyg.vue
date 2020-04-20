<template>
    <ckeditor class="mb-3" :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    name:   "ClassicEditor",
    data(){
        return{
            editor: ClassicEditor,
            editorData: '<p>Rich-text editor content.</p>',
            editorConfig: {
                // The configuration of the rich-text editor.
            }
        }
    }
}
</script>

<style>

</style>