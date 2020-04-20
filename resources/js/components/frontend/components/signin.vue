<style lang="scss" scoped>

</style>
<template>
  <!-- Modal -->
  <div>
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <SignIn/>
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="signinModalLabel">Sign In</h5>
        <button @click="closeSignInModal" id="closeSignInModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div v-if="err" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ errMsg }}
            <button type="button" id="dismissErr" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" v-model="signInForm.email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" v-model="signInForm.password" placeholder="Password">
          </div>
      </div>
      <div class="modal-footer d-flex flex-column">        
            <button type="button" @click="signinFunc" class="btn btn-block btn-info">Sign In</button>
            <span>or</span>
            <a @click.prevent="getGoogleCredentials" href="" type="button" class="btn btn-block btn-danger" data-dismiss="modal"> Sign in with Google <i class="icon-google"></i> </a>
      </div> -->
    </div>
  </div>
</div>
<modals-container/>
</div>
</template>

<script>
import { mapActions } from 'vuex'
import SignIn from './sub/signin'
export default {
    name        : 'signInModal',
    components  : { SignIn },
    props   : [],
    data(){
        return{
            signInForm:{
                "email"       : null,
                "password"    : null,
            },
            errMsg : null,
            err : false,
        }
    },
    methods:{
        
      //   ...mapActions({
      //       signInAction        : 'auth/signIn',
      //       googleSignInAction  : 'auth/googleSignIn'
      //   }),

      //   closeSignInModal(){
      //       this.signInForm.email = null
      //       this.signInForm.password = null
      //   },

      //   signinFunc(){
      //     this.signInAction(this.signInForm).then((response)=>{
              
      //         document.getElementById('closeSignInModal').click();
      //         this.signInForm.email = null
      //         this.signInForm.password = null
              
      //     }).catch((err)=>{
                            
      //         this.errMsg = "Wrong Username or Password"
      //         this.err = true;
      //         setTimeout(()=>{
      //             document.querySelector('#dismissErr').click()
      //             this.err = false;
      //             this.errMsg = null
      //         },3000)
              
      //     })
      //   },
      //   getGoogleCredentials() {
      //    this.$gAuth.signIn()
      //      .then(GoogleUser => {
      //        let prof = GoogleUser.getBasicProfile()
      //           let profile = {
      //               id       : prof.getId(),
      //               name     : prof.getName(),
      //               email    : prof.getEmail(),
      //           }
                
      //           this.googleSignInAction( profile )
      //           document.getElementById('closeSignInModal').click();
      //       })
      //      .catch(error => {
      //          console.log(error.response.data);               
      //      });
      //  },
       
    },
    mounted(){
        
    }

}
</script>
