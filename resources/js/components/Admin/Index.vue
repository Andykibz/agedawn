<template>
    <div >
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-4 col-sm-6 col-12">
                    <div @click="redirectPage('products')" class="card bg-dark text-white link-card">
                        <img src="/imgs/admin/shop.jpg" class="card-img" >
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h3 class="card-title mb-3">Shops</h3>
                            <p class="card-text">Visit the Shop Section to Add/Edit/Delte Products and Check on Orders</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div @click="redirectPage('users')" class="card bg-dark text-white link-card">
                        <img src="/imgs/admin/article.jpg" class="card-img" >
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h3 class="card-title mb-3">Articles</h3>
                            <p class="card-text">Create Articles related to The Band.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div @click="redirectPage('users')" class="card bg-dark text-white link-card">
                        <img src="/imgs/admin/users.jpg" class="card-img" >
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h3 class="card-title mb-3">Users</h3>
                            <p class="card-text">See you registered Users and even assign Roles to them</p>
                        </div>
                    </div>
                </div>

                

            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div @click="redirectPage('users')" class="card bg-dark text-white link-card">
                        <img src="/imgs/admin/band.jpg" class="card-img" >
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h3 class="card-title mb-3">Members</h3>
                            <p class="card-text">Update your Band Members with their responsibilities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

           

            
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }
        },
        methods:{
            redirectPage(page){
                // window.location.href = `/admin/products`;
                this.$router.push(page);

            }
        },
        mounted() {
           
        }
    }
</script>

<style lang="scss" scoped>
    .card-img-overlay{
        text-shadow: 3px 3px 3px #333;
        p{
            font-size: 18px;
        }
    }
    .link-card{
        &:hover{
            cursor: pointer;
        }
    }

</style>
