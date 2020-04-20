<template>
    <div class="form-group">
        <label :for="label+'_id'">{{ label }}</label>
        <input @change="handling" type="text" v-model="textVal" 
                class="form-control" :id="label+'_id'" 
                :placeholder="label" required>
    
        <small class="form-text text-danger" v-text="errMsg"></small>
    </div>  
</template>

<script>
export default {
    name    :   "TextInput",
    props   :   {   
                    label           : String,
                    placeholder     : String,
                    value           : String,
                    required        : String,
                },
    data(){
        return{
            textVal    :    '',
            errMsg     :    '',


        }
    },
    methods:{
        handling(){
            if(this.textVal.length < 3){
                this.errMsg = "You need to have at least 3 characters for the title"
            }else{
                this.errMsg = ""
            }
        },
    }

}
</script>

<style>

</style>