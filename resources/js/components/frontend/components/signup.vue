<template>
  <!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
            <button id="closeSignUpModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" v-model="signupForm.name" placeholder="Username" required> 
            </div>
            <div class="form-group">
                <input type="text" class="form-control" v-model="signupForm.email" placeholder="Email" required> 
            </div>
            <div class="form-group">
                <input type="password" class="form-control" v-model="signupForm.password" placeholder="Password" required>
            </div>
            <!-- <div class="form-group">
                <input type="password" class="form-control" v-model="signupForm.c_password" placeholder="Confirm Password" required>
            </div> -->
        </div>
        <div class="modal-footer d-flex flex-column">        
            <button type="button" @click="signupFunc" class="btn btn-block btn-primary">Sign Up</button>
            <span>or</span>
            <a @click.prevent="getGoogleCredentials" href="" type="button" class="btn btn-block btn-danger" data-dismiss="modal"> Sign up with Google <i class="icon-google"></i> </a>
        </div>
    </div>
  </div>
</div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name    : 'SignUpModal',
    data(){
        return{
            signupForm    : {
                name    : null,
                email       : null,
                password    : null,
            }
        }
    },
    methods:{
        ...mapActions({
            signInAction        : 'auth/signIn',
            googleSignInAction  : 'auth/googleSignIn'
        }),

        signupFunc(){
            self = this;
          axios.post('/api/auth/signup',self.signupForm)
                .then((response)=>{
                    
                    console.log(response);
                    document.getElementById('closeSignUpModal').click();
                    
                    
                }).catch((error)=>{
                    console.log(error);
                    
                }).finally(()=>{
                    self.signupForm.name = null;
                    self.signupForm.email = null;
                    self.signupForm.password = null;                    
                })
                
        },
        
        getGoogleCredentials() {
         this.$gAuth.signIn()
           .then(GoogleUser => {
                let profile = {
                    id       : GoogleUser.getBasicProfile().SU,
                    name     : GoogleUser.getBasicProfile().Ad,
                    email    : GoogleUser.getBasicProfile().zu
                }
                this.googleSignInAction( profile )               
            })
           .catch(error => {
               console.log(error.response.data);               
           });
       },
    }

}
</script>

<style>

</style>