<template>
    <div class="form-group">
        <label :for="label+'_id'">{{ label }}</label>
        <textarea class="form-control" v-model="textAreaVal" :placeholder="placeholder"></textarea>
        <small class="form-text text-danger" v-bind="errMsg"></small>
    </div>  
</template>

<script>
export default {
    name    :   "TextAreaInput",
    props   :   {   
                    errMsg      : String,
                    label       : String,
                    placeholder : String,
                    value       : String,
                },
    data(){
        return{
            textAreaVal    : '',

        }
    }

}
</script>

<style>

</style>