<template>
  <div class="modal" id="signOutModal" tabindex="-1" role="dialog" aria-labelledby="signOutLabel" aria-hidden="true">
        <div class="modal-dialog model-sm" role="document">
            <div class="modal-content">
                <div class="box">
                    <div class="row">
                        <div id="bp-left-in" class="box-part col-12">
                            <div id="partition-signin" class="partition">
                                <div class="partition-title">Sign Out</div> 
                                <button v-show="false" id="signoutcloseModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="partition-content mb-4">
                                    Sure you want to sign out?
                                </div> 
                                <div class="d-flex flex-row justify-content-center button-set mb-3">
                                    <a role="" @click="closeModal" id="signoutbutton" class="my-1 button button--antiman button--size-sm button--text-medium">Cancel</a>
                                    <a @click.prevent="signOut" class="my-1 button button--antiman button--size-sm button--text-medium">Sign Out </a>                         
                                </div> 
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    name        : 'SignOut',
    methods : {
        ...mapActions({
            signOutAction : 'auth/signOut'
        }),
        closeModal(){
            document.querySelector('#signoutcloseModal').click()
        },
        signOut(){
            console.log("Signing Out");
            this.signOutAction().then(()=>{
                this.$router.replace({
                    name    : 'home'
                });
            });
            document.querySelector('#signoutcloseModal').click()
            
        }
    }   
}
</script>

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
    width: 100%;
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
        .partition-content {
            padding: 0 20px;
            box-sizing: border-box;
            font-size: medium;
            text-align: center;
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

}

</style>