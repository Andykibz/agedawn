<template>
    <div>
            <label :for="label+'_id'">{{ label }}</label>
        <div class="custom-file">
            <br><br>
            <div class="image-wrapper">
                <img ref="file" :src="imgsource" class="img-fluid img-thumbnail"/>
            </div>
            <input type="file" class="custom-file-input" name="image" :id="label+'_id'">
            <label class="custom-file-label" :for="label+'_id'">{{ label }}</label>
    </div>
    </div>
</template>

<script>
export default {
    name        :   'FileInput',
    props       :   [ 'label',],
    data(){
        return{
            imgsource   :   '',
            f
        }
    }
}
</script>

<style>

</style>