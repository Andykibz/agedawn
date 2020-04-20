<template>
  <div>
      
  </div>
</template>

<script>
export default {
    name:   "MembersForm",
    data(){
        return{
                selectedFile    : null,
                name            : null,
                member          :   {
                    name    : null,
                    image   : null
                }
        }
    },    
    methods:{
        changelabel(event){
            let filename = event.target.value.split('\\').pop()
            document.getElementById('custom-file-label').textContent = filename
            this.selectedFile = event.target.files[0]
        },
        submitForm(){
            memberForm = new FormData()
            memberForm.set('name',this.name)
            memberForm.append('image', this.selectedFile || null )
        }
    }
}
</script>

<style>

</style>