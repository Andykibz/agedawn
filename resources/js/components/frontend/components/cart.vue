<template>
<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                <button id="closeSignInModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="OrderDetails">
                    <div class="card mb-2">
                        <label class="mb-0" type="button" data-toggle="collapse" data-target="#cartContents" aria-expanded="true" aria-controls="cartContents">
                            <div class="border rounded p-2 mb-2" id="cartContentsHeading">
                                Cart Contents
                            </div>
                        </label>
                        <div id="cartContents" class="collapse show" aria-labelledby="cartContentsHeading" data-parent="#OrderDetails">
                            <div class="row mb-1 border-bottom pb-1" v-for="item in cart" :key="item.slug">
                                <div class="pr-1 col-2 d-flex align-items-center">
                                    <img class="img-fluid img-thumbnail" :src="'/storage/Products/thumbs/'+item.image" alt="">
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <span class="text-info">
                                        {{ item.name }}
                                    </span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-between align-items-center">
                                    <i @click="changeQuantity(item.slug, item.quantity-1 )" class="icon-minus"></i>
                                    <span> {{ item.quantity }} </span>
                                    <i @click="changeQuantity(item.slug, item.quantity+1 )" class="icon-plus"></i>
                                </div>
                                <div class="col-3 d-flex flex-column align-items-center">
                                    <span class="mb-1 text-right">
                                        {{ item.quantity }} &times; Ksh {{ item.price }}
                                    </span>
                                    <span class="mb-1 text-right bold">
                                        Ksh {{ item.quantity * item.price }} 
                                    </span>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <i @click="deleteitemAction(item.slug)" class="icon-cancel text-dark"></i>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <span class="font-weight-bold"> <strong>Total&nbsp;:&nbsp;</strong> Ksh {{ totalCost }} </span>
                            </div>
                        </div>
                        <!-- <hr> -->
                    </div>
                    
                    <div class="card">
                        <label class="mb-0 collapsed" type="button" data-toggle="collapse" data-target="#personalDetails" aria-expanded="false" aria-controls="PersonalDetails">
                            <div class="border rounded p-2 mb-2" id="PersonalDetailsHeading">
                                Personal Details
                            </div>
                        </label>
                        <div id="personalDetails" class="collapse" aria-labelledby="PersonalDetailsHeading" data-parent="#OrderDetails">
                            <div class="card-body">
                                <div class="row personal-details">
                                    <div class="col-12 mb-2">
                                        <input type="text" class="form-control" placeholder="Full Name">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="text" class="form-control" placeholder="Email address">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="text" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="text" class="form-control" placeholder="Location">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
                
            <div class="modal-footer d-flex flex-row">        
                <button @click="setcheckOut" class="btn btn-outline-danger mr-2">Check Out</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { mapGetters, mapActions, mapState } from 'vuex'
export default {
    name        :   "Cart",
    computed    :   {
        // cart() { return this.$store.state.cartItems },
        // ...mapState({
        //     cart : state=>state.cartItems
        // }),
        ...mapState({
            // cart        :   'cart/getCartItems',
        }),
        ...mapGetters({
            cart        :   'cart/getCartItems',
            totalCost   :   'cart/getTotalCost'
        })
    },
    data(){
        return{
            checkout    :   false,
        }
    },
    methods:{
        ...mapActions({
            changeQuantityAction    :   'cart/changeQuantity',
            deleteitemAction        :   'cart/deleteItem'
        }),
        changeQuantity( slug, num ){
           
            this.changeQuantityAction( {
                slug    : slug,
                num     : num
            } )
        },
        deleteitem( slug ){
            this.deleteitemAction(slug)
        },
        setcheckOut(){
            this.checkout = true
        }
        
        
    },
    mounted(){
        
    }

}
</script>

<style scoped>
    img{
        /* max-height: 56px; */
    }
    i:hover{
        cursor: pointer;
    }
    input[type="text"]{
        border: none;
        border-bottom: solid #ddd 1px;
        padding: 0;
        margin: 0;
    }
    label{
        text-transform: uppercase;
        font-weight: 700;
    }
</style>