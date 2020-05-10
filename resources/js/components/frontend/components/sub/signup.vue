<template>
    <div>
        <div class="box">
            <div class="row">
                <div id="bp-left-up" class="box-part col-md-6 col-12">
                    <div id="partition-signup" class="partition">
                        <div class="partition-title">Sign Up</div> 
                        <div class="partition-form mb-4">
                            <form autocomplete="">
                                <input v-model="signupForm.name" id="up-name" type="text" placeholder="Name"> 
                                <small class="text-danger">{{ err['name'] }}</small>
                                <input v-model="signupForm.email" id="up-email" type="text" placeholder="Email"> 
                                <small class="text-danger">{{ err['email'] }}</small>
                                <input v-model="signupForm.password" id="up-password2" type="password" placeholder="Password">
                                <small class="text-danger">{{ err['password'] }}</small>
                            </form> 
                        </div> 
                        <div class="d-flex flex-column button-set">
                            <a role="" @click="signupFunc" id="signupbutton" class="my-1 button button--antiman button--size-sm button--text-medium">Sign Up</a>
                            <a @click.prevent="getGoogleCredentials"
                                class="my-1 button button--antiman button--size-sm button--text-medium google d-flex justify-content-center align-items-center">
                                Sign up with <span>Google</span>&nbsp;<i class="icon-google"></i> 
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
    name    : 'SignUpModal',
    data(){
        return{
            err     : {
                name      : null,
                email     : null,
                password  : null,
            },
            errMsg  : null,
            signupForm    : {
                name        : null,
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
                    self.signupForm.name = null;
                    self.signupForm.email = null;
                    self.signupForm.password = null;                    
                    
                    
                }).catch((error)=>{
                    let errs = error.response.data.errors
                    console.log(error.response.data);
                    ( errs['name'] != undefined ) ? self.err.name = errs['name'][0] : self.err.name = null;
                    ( errs['email'] != undefined ) ? self.err.email = errs['email'][0] : self.err.email = null;
                    ( errs['password'] != undefined ) ? self.err.password = errs['password'][0] : self.err.password = null;  
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
    max-width: 100%;
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