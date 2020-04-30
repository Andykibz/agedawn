<template>
<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                <button id="closeCartModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div v-if="qErr" class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ qErr }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="accordion" id="OrderDetails">
                    <div class="card mb-2">
                        <label class="mb-0 triggeraccordion" type="button" data-toggle="collapse" data-target="#cartContents" aria-expanded="true" aria-controls="cartContents">
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
                        <label @click.prevent="getuserdetails" class="mb-0 triggeraccordion collapsed" type="button" data-toggle="collapse" data-target="#personalDetails" aria-expanded="false" aria-controls="PersonalDetails">
                            <div  class="border rounded p-2 mb-2" id="PersonalDetailsHeading">
                                Personal Details                                    
                            </div>
                        </label>
                        <div id="personalDetails" class="collapse" aria-labelledby="PersonalDetailsHeading" data-parent="#OrderDetails">
                            <div class="card-body">
                                <div class="row personal-details">
                                    <div class="col-12 mb-2">
                                        <input v-model="fname" type="text" class="form-control" placeholder="Full Name">
                                        <small class="text-danger" v-text="this.validMsgs.fname"></small>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input v-model="email" type="text" class="form-control" placeholder="Email address">
                                        <small class="text-danger" v-text="this.validMsgs.email"></small>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input v-model="phone" type="text" class="form-control" placeholder="Phone Number">
                                        <small class="text-danger" v-text="this.validMsgs.phone"></small>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input v-model="location" type="text" class="form-control" placeholder="Location eg. Nairobi, Kenya">
                                        <small class="text-danger" v-text="this.validMsgs.location"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
                
            <div class="modal-footer d-flex flex-row">        
                <button @click="checkoutFunc" class="btn mr-2" :class="{ 'btn-outline-danger' : checkout, 'btn-outline-success':!checkout }" >{{ checkout ? 'Cancel Order in '+countdownTime : 'Checkout' }} </button>
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
            totalCost   :   'cart/getTotalCost',
            user        :   'auth/user'
        })
    },
    data(){
        return{
            checkout        :   false,
            countdownTime   :   null,
            fname       :   null,
            email       :   null,
            phone       :   null,
            location    :   null,
            qErr        :   null,
            validMsgs :{
                fname   :   null,
                email   :   null,
                phone   :   null,
                location   :   null
            }
        }
    },
    methods:{

        ...mapActions({
            changeQuantityAction    :   'cart/changeQuantity',
            deleteitemAction        :   'cart/deleteItem',
            makeOrderAction         :   'cart/makeOrder',
            clearCartAction         :   'cart/clearCart',
        }),
        getuserdetails(){
            if( this.user ){
                this.fname = this.user.name
                this.email = this.user.email
            }
        },
        changeQuantity( slug, num ){
           
            this.changeQuantityAction( {
                slug    : slug,
                num     : num
            })
        },
        deleteitem( slug ){
            this.deleteitemAction(slug)
        },
        processOrder(){
            let self = this
            this.makeOrderAction({
                name        :   self.fname,
                email       :   self.email,
                location    :   self.location,
                phone       :   self.phone,
            }).then((response)=>{
                // console.log(response.data);
                
                if( response.data == 1 ){
                    self.checkout = false;
                    self.countdownTime = 4;
                    self.fname = null
                    self.email = null
                    self.phone = null
                    self.location = null
                    document.querySelector('#closeCartModal').click()
                    self.clearCartAction()
                }
            }).catch((err)=>{
                let errors = err.response.data.errors
                // console.log(err.response.data);
                self.qErr = `${err.response.data.error.item} deficits at ${err.response.data.error.deficit}. Reduce its quantity.`
                console.log(self.qErr);
                
                               
                ( errors['name'] != undefined ) ? self.validMsgs.fname = errors['name'][0] : '';
                ( errors['email'] != undefined ) ? self.validMsgs.email = errors['email'][0] : '';
                ( errors['phone'] != undefined ) ? self.validMsgs.phone = errors['phone'][0] : '';
                ( errors['location'] != undefined ) ? self.validMsgs.location = errors['location'][0] : '';
                
            })
        },
        validate(){
            
            let err = false
            if( this.fname == null || this.fname.match(/\S+/) == null ){ 
                this.validMsgs.fname = "Enter your full names Please!"; 
                err= true;
            }else{ this.validMsgs.fname = null }
            if( this.email == null || this.email.match(/\S+/) == null ) { 
                this.validMsgs.email = "Enter a valid email Address Please!" 
                err= true;
            }else{ this.validMsgs.email = null }
            if( this.phone == null || this.phone.match(/\S+/) == null ) { 
                this.validMsgs.phone = "Enter a valid phone number Please!";
                err= true;
            }else{ this.validMsgs.phone = null }
            if( this.location == null || this.location.match(/\S+/) == null ) { 
                this.validMsgs.location = "Enter the delivery location Please!" 
                err = true;
            }else{ this.validMsgs.location = null }
            return err;
        },
        checkoutFunc(){
            let err = this.validate()
            if( err == false){
                this.checkout = !this.checkout;
                this.countdownTime = 2;
                this.countdownTimeFunc();                
            }else{
                document.querySelector('.collapse.show').classList.remove('show')
                document.querySelector('#personalDetails').classList.add('show')
            }
        },
        async countdownTimeFunc(){
            this.countdownTime -= 1;
            if( this.countdownTime > 0 && this.checkout ){
                setTimeout(this.countdownTimeFunc, 1000);            
                console.log(this.countdownTime)
            }if( this.countdownTime == 0 ){
                this.processOrder()            
            }
        }
        
    },
    mounted(){
        
    }

}
</script>

<style scoped>
[]
    label.triggeraccordion{
        cursor: pointer;
    }
    
    i:hover{
        cursor: pointer;
    }
    input[type="text"]{
        border: none;
        border-bottom: solid #ddd 1px;
        padding: 0 0 0 1em;
        margin: 0;
        line-height: 0;
    }

    .modal-content{
        /* background-color: rgba(248, 247, 247, 0.596); */
        font-size: 1em !important;
    }

    label{
        text-transform: uppercase;
        font-weight: 600;
    }
</style>