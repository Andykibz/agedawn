<template>
    <div>
    <div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for=""> Category Name </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Category Name" aria-label="Category Name" aria-describedby="cat_name" v-model="cat_name">
                            <div class="input-group-append">
                                <button @click="saveCategory" class="btn btn-outline-secondary" type="button" >Save</button>
                            </div>
                        </div>
                    </div>
                    <ul v-if="categories" class="list-group">
                        <li class="list-group-item d-flex justify-content-between" v-for="category in categories" :key="category.id">
                            <span>{{ category.name }}</span>
                            <span>
                                <button class="btn btn-sm btn-outline-info" @click="editCategory(category.id,category.name)">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" @click="deleteCategory(category.id)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </span>
                        </li>    
                    </ul>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
            </div>
        </div>
    </div>
    <button @click="getCategories" type="button" class="btn btn-info" data-toggle="modal" data-target="#categoriesModal">
        Manage Categories
    </button>

    </div>
</template>

<script>
export default {
    name: "Categories",
    data(){
        return{
            id  : null,
            cat_name : null,
            categories: [],
        }
    },
    methods:{
        getCategories(){
            self = this;
            self.id = null;
            self.cat_name = null;
            axios.get('/api/admin/categories')
            .then((response)=>{
                self.categories = response.data
                console.log(response.data);
            }).catch((err)=>{
                console.log(err);
                self.categories = []
                
            });
        },
        saveCategory(){
            self = this
            if( !this.id ){
                axios.post('/api/admin/category',{
                    name    : self.cat_name
                }).then((response)=>{
                    self.getCategories()
                }).catch((err)=>{
                    console.log(err);                    
                })
            }else if( !this.id ){
                axios.post('/api/admin/category/'+self.id,{
                    name    : self.cat_name
                }).then((response)=>{
                    self.getCategories()
                }).catch((err)=>{
                    console.log(err);                    
                })
            }
        },
        editCategory(id,name){
            this.id = id
            this.cat_name = name
        },
        deleteCategory(id){
            self = this
            axios.delete('/api/admin/category/'+id)
            .then((response)=>{
                self.getCategories()
            }).catch((err)=>{
                console.log(err);
            })
        }
    },
    mounted(){
    }
}
</script>

<style>

</style>