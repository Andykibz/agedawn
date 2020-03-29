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
            <button type="button" class="btn btn-block btn-danger" data-dismiss="modal"> Sign up with Google <i class="icon-google"></i> </button>
        </div>
    </div>
  </div>
</div>
</template>

<script>
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
        signupFunc(){
            self = this;
          axios.post('/api/auth/signup',self.signupForm)
                .then((response)=>{
                    
                    console.log(response);
                    document.getElementById('closeSignUpModal').click();
                    document.getElementById('signInLink').click()
                    
                }).catch((error)=>{
                    console.log(error);
                    
                }).finally(()=>{
                    self.signupForm.name = null;
                    self.signupForm.email = null;
                    self.signupForm.password = null;                    
                })
                
        },
    }

}
</script>

<style>

</style>