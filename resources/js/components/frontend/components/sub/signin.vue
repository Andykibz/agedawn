<template>
    <div>
        <div class="box">
            <div class="row">
                <div id="bp-left-in" class="box-part col-md-6 col-12">
                    <div id="partition-signin" class="partition">
                        <div class="partition-title">Sign In</div> 
                        <div class="partition-error">
                            <div v-if="err" class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="errmsg"> {{ errMsg }} </span>
                                <button type="button" id="dismissErr" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <button v-show="false" id="signincloseModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="partition-form mb-4">
                            <form autocomplete="">
                        
                                    <input v-model="signInForm.email" id="in-email" type="text" placeholder="Email"> 
                                    <input v-model="signInForm.password" id="in-password2" type="password" placeholder="Password">
                                    <!-- </div> -->
                            </form> 
                            <!-- <div style="margin-top: 42px;"> -->
                        </div> 
                        <div class="d-flex flex-column button-set">
                            <a role="" @click="signinFunc" id="signinbutton" class="my-1 button button--antiman button--size-sm button--text-medium">Sign In</a>
                            <a @click.prevent="getGoogleCredentials"
                                class="my-1 button button--antiman button--size-sm button--text-medium google d-flex justify-content-center align-items-center">
                                Sign in with <span>Google</span>&nbsp;<i class="icon-google"></i> 
                            </a>                         
                        </div> 
                    </div>
                </div>
                <div id="bp-right" class="box-part col-md-6 d-md-block d-sm-none d-none ">
                    <div class="box-messages"></div>
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name        : 'signInModal',
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
        
        ...mapActions({
            signInAction        : 'auth/signIn',
            googleSignInAction  : 'auth/googleSignIn'
        }),

        closeSignInModal(){
            this.signInForm.email = null
            this.signInForm.password = null
        },

        signinFunc(){
          this.signInAction(this.signInForm).then((response)=>{
    
              
              document.querySelector('#signincloseModal').click();
              this.signInForm.email = null
              this.signInForm.password = null
              
          }).catch((err)=>{
              console.log(err.response.data);
              
              this.errMsg = "Wrong Username or Password"
              this.err = true;
              setTimeout(()=>{
                  document.querySelector('#dismissErr').click()
                  this.err = false;
                  this.errMsg = null
              },3000)
              
          })
        },
        getGoogleCredentials() {
         this.$gAuth.signIn()
           .then(GoogleUser => {
             let prof = GoogleUser.getBasicProfile()
                let profile = {
                    id       : prof.getId(),
                    name     : prof.getName(),
                    email    : prof.getEmail(),
                }
                
                this.googleSignInAction( profile )
                document.getElementById('closeSignInModal').click();
            })
           .catch(error => {
               console.log(error.response.data);               
           });
       },
       
    },
    mounted(){
        
    }

}
</script>

<style>

</style>
<style lang="scss" scoped>
.box {
    @media only screen and (max-width: 768px){
        // width: 480px;
        .button{
            max-width:100% !important;
        }
    }

    background: #ECEFF1;
    overflow: hidden;
    // width: 656px;
    height: auto;
    border-radius: 2px;
    box-shadow: 0 0 40px #000;
    color: #8b8c8d;
    position: relative;
    .box-part {
        position: relative; 
        vertical-align: top; 
        height: 100%;
    }
    .partition {
        width: 100%;
        height: 100%;
    }
    .partition{
        .partition-title {
            box-sizing: border-box;
            padding: 30px;
            width: 100%;
            text-align: center;
            letter-spacing: 1px;
            font-size: 20px;
            font-weight: 300;
            text-transform: uppercase;
        }
        .partition-form {
            padding: 0 20px;
            box-sizing: border-box;
        }
        .partition-error {
            box-sizing: border-box;
            padding: 0 20px;
            width: 100%;
            text-align: center;
            letter-spacing: 1px;
            font-weight: 300;
        }
    }
}

.errmsg{
    font-size: 1em !important;
}

form {
    display: block;
    margin-top: 0em;
    input[type=password], input[type=text] {
        background: transparent;
        display: block;
        box-sizing: border-box;
        margin-bottom: 4px;
        width: 100%;
        font-size: 1.0em;
        line-height: 2;
        border: 0;
        border-bottom: 1px solid #aaa;
        padding: 4px 8px;
        transition: all .5s;
        outline: none;
    }
}

.box .button-set {
    margin-bottom: 8px;
    padding: 0 20px;
}

.box .box-part#bp-right {
    position: absolute;
    overflow: hidden;
    right: 0;
    height: 100%;
    background: url(/imgs/drums_sm.jpg) no-repeat 0 0;
    background-size: cover;
    border-left: 1px solid #eee;
    box-shadow: inset 1em 1em 3em rgba( #000000, .8), inset -1em -1em 3em rgba( #000000, .8);
    opacity: .9;
}
.button{
    height: auto;
    line-height: 2;
    text-align: center;  
    padding: .6em 1em !important;
    &.google{
        color: #f00 !important;
    }
    &:hover{
        color: #000 !important;

    }
}
.button--antiman{
    &:hover{
        cursor: pointer;
    }
    &::after{
        background: rgb(255, 255, 255);
        box-shadow: 1px 1px 3px #ddd,-1px -1px 3px #eee,
    }
}
.v--modal-box.v--modal{
    top:3em !important;
}

</style>