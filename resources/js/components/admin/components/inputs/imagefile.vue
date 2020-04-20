<template>
    <div>
            <label :for="label+'_id'">{{ label }}</label>
        <div class="custom-file">
            <br><br>
            <div class="image-wrapper">
                <img ref="file" :src="imgsource" class="img-fluid img-thumbnail"/>
            </div>
            <input @change="changelabel($event)" type="file" class="custom-file-input" name="image" :id="slugify(label)+'_id'">
            <label id="custom-file-label" class="custom-file-label" :for="slugify(label)+'_id'">{{ label }}</label>
    </div>
    </div>
</template>

<script>
export default {
    name        :   'FileInput',
    props       :   ['label',],
    data(){
        return{
            imgsource   :   '',

        }
    },
    methods:{
        changelabel(event){
            let filename = event.target.value.split('\\').pop()
            document.getElementById('custom-file-label').textContent = filename
        },

        slugify(text){
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }
    }
}
</script>

<style>

</style>