<template>
  <!-- Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signinModalLabel">Sign In</h5>
        <button id="closeSignInModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" v-model="signInForm.email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" v-model="signInForm.password" placeholder="Password">
          </div>
      </div>
      <div class="modal-footer d-flex flex-column">        
            <button type="button" @click="signinFunc" class="btn btn-block btn-primary">Sign In</button>
            <span>or</span>
            <a @click.prevent="getGoogleCredentials" href="" type="button" class="btn btn-block btn-danger" data-dismiss="modal"> Sign in with Google <i class="icon-google"></i> </a>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    name    : 'signInModal',
    props   : [],
    data(){
        return{
            signInForm:{
                "email"       : null,
                "password"    : null,
            }
        }
    },
    methods:{
        
        ...mapActions({
            signInAction        : 'auth/signIn',
            googleSignInAction  : 'auth/googleSignIn'
        }),

        signinFunc(){
          this.signInAction(this.signInForm)
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
                document.getElementById('closeSignInModal').click();
            })
           .catch(error => {
               console.log(error.response.data);               
           });
       },
    }

}
</script>

<style scoped>

</style>