<template>
  <div>
      <form @submit.prevent="submitForm" action="">
            <legend> Member Details </legend>
            <div class="form-group">
                <label for="">Member's Name</label>
                <input type="text" v-model="member.name" class="form-control" placeholder="Name">
            </div>
            <div class="custom-file">
                <div class="image-wrapper">
                    <img ref="file" :src="member.image" class="img-fluid img-thumbnail"/>
                </div>
                <input @change="changelabel($event)" type="file" class="custom-file-input" id="member-image"
                aria-describedby="product-image">
                <label id="custom-file-label" class="custom-file-label" for="member-image">Choose File</label>
            </div>
      </form>
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