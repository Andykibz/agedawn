<template>  
<div class="row">
    <div class="col-md-8 col-12">
        <div class="row">
            <div v-for="member in members" :key="member.id" class="col-md-4">
                <div  class="card mb-4 shadow-sm">
                    <img :src="`/storage/About/${member.image}`" class="card-img-top img-fluid" :alt="`${member.name}_image`" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title" v-text="member.name"></h5>
                        <p class="card-text" v-text="member.role"></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button @click="editMember(member)" type="button" class="btn btn-sm btn-outline-info">Edit</button>
                                <button @click="deleteMember(member.id)" type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-12 ">    
        <legend> Member Details </legend>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" v-model="member.name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="">Role</label>
            <input type="text" v-model="member.role" class="form-control" placeholder="Role">
        </div>
        <label for="">Image</label>
        <div class="custom-file">
            <div class="image-wrapper">
                <img ref="file" :src="member.image" class="img-fluid img-thumbnail"/>
            </div>
            <input @change="changelabel($event)" type="file" class="custom-file-input" id="member-image"
            aria-describedby="product-image">
            <label id="custom-file-label" class="custom-file-label" for="member-image">Choose File</label>
        </div>
        <button @click="saveMember" role="button" class="btn btn-dark">Submit</button>
    </div>
</div>
  
</template>

<script>
export default {
    name    : 'BandMembers',
    props   : [],
    components :{  },
    data(){
        return{
            id      :   null,
            member  : {
                name    : null,
                image   : null,
                role    : null,
            },
            members     : [],

        }
    },
    methods : {
        changelabel(event){
            let filename = event.target.value.split('\\').pop()
            document.getElementById('custom-file-label').textContent = filename
            this.member.image = event.target.files[0]
        },

        editMember( member ){
            this.id =  member.id;
            this.member.name = member.name;
            this.member.role = member.role;
        },

        saveMember( member ){
            let url = ''
            url = ( this.id != null ) ? `/api/admin/member/${this.id}` : `/api/admin/member`
            let memberForm = new FormData()
            memberForm.set('name',this.member.name)
            memberForm.set('role',this.member.role)
            if(this.member.image!= null){ memberForm.append('image',this.member.image) }
            axios.post( url, memberForm )
                .then((response)=>{
                    this.getBand()
                    this.member.name = null;
                    this.member.role = null;
                    this.member.image = null;
                    this.id = null;
                    document.getElementById('custom-file-label').textContent = "Choose Image"
                }).catch((err)=>{
                    console.log(err.response.data); 
                });
        },

        deleteMember(id){
            axios.delete(`/api/admin/member/${id}`).then((response)=>{
                this.getBand()
            }).catch((err)=>{
                console.log(err.response.data); 
            });

        },

        getBand(){
            axios.get('/api/admin/members').then((response)=>{
                this.members = response.data.data
                console.log(this.members);
                
            }).catch((err)=>{
                console.log(err.response.data); 
            });
        }
    },
    mounted(){
        this.getBand()
    }

}
</script>

<style scoped>

</style>


