<template>
<div class="container-fluid">
    <div class="mb-3">
        <h5>Access Control</h5>
        <div class="custom-control custom-checkbox">
            <input @change="saveAccess" type="checkbox" class="custom-control-input" v-model="accessControl" id="actl">
            <label class="custom-control-label" for="actl">Check this custom checkbox</label>
        </div>

    </div>
    <div class="row">
        
        <div v-for="user in users" :key="user.id" class="col-lg-3 col-sm-4 col-12">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ user.name }}
                        <br/>
                        <small class="text-secondary">{{ user.email }}</small>
                    </h5>
                </div>
                <div class="card-body">
                    
                    <form :id="`user-form-${user.id}`">
                        <div class="mb-3">
                            <strong class="text-dark">Permissions</strong>
                            <div class="custom-control custom-checkbox">
                                
                                <input :checked="checkPerm( user.permissions, 'comment' )" name="permissions[]" value="comment" type="checkbox" class="custom-control-input" :id="`comment-${user.id}`"  />
                                <label class="custom-control-label" :for="`comment-${user.id}`">Comments</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input :checked="checkPerm( user.permissions, 'subscribe' )" name="permissions[]" value="subscribe" type="checkbox" class="custom-control-input" :id="`subscribe-${user.id}`">
                                <label class="custom-control-label" :for="`subscribe-${user.id}`">Subscribes</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input :checked="checkPerm( user.permissions, 'backend_access' )" name="permissions[]" value="backend_access" type="checkbox" class="custom-control-input" :id="`backend_access-${user.id}`">
                                <label class="custom-control-label" :for="`backend_access-${user.id}`">Backend Access</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input :checked="checkPerm( user.permissions, 'elevated_backend_access' )" name="permissions[]" value="elevated_backend_access" type="checkbox" class="custom-control-input" :id="`elevated_backend_access-${user.id}`">
                                <label class="custom-control-label" :for="`elevated_backend_access-${user.id}`">Elevated Backend Access</label>
                            </div>

                        </div>
                    </form>
                    <div class="btn-group">
                        <button @click="save(user.id,`user-form-${user.id}`)" type="button" class="btn btn-sm btn-outline-info">Save</button>
                        <button @click="deleteUser(member.id)" type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name    :   "Users",
    computed    :{
        checking: (perms, perm)=>{
            return ''
        },
    },
    data(){
        return{
            users : [],
            permissions: null,
            accessControl : null,
        }
    },
    methods:{
        getUsers(){
            axios.get('/api/admin/users').then((response)=>{
                this.users = response.data.users.data
                this.accessControl = (response.data.access.value == 0 ) ? false : true;
            }).catch((err)=>{
                console.log(err.response.data.value);                
            })
        },

        saveAccess(){
            axios.put('/api/admin/user/enforce_access',{
                access : this.accessControl
            })
            .then((response)=>{
                console.log(response.data);
            })
            .catch(( err )=>{
                console.log(err.response.data);
                
            })
        },
        save(id,form){
            let PermissionsForm = new FormData( document.querySelector(`#${form}`) )

            // console.log(PermissionsForm.entries());
            // Display the key/value pairs

            axios.post(`/api/admin/user/${id}/permission`,PermissionsForm).then((response)=>{
                console.log(response.data);                
            }).catch((err)=>{
                console.log(err.response.data);
            })
        },

        checkPerm( permissions, perm ){
            return permissions.find((obj)=>{
                return  obj.name === perm 
            })
            
            
        },

        deleteUser(id){
            axios.delete(`/api/admin/user/${id}`).then((response)=>{
                this.getUsers()
            }).catch((err)=>{
                console.log(err.response.data); 
            });

        },

    },
    mounted(){
        this.getUsers()
    }
}
</script>

<style>

</style>