<template>
    <div class="d-flex flex-column" style="height:100%">
        <navigation></navigation>
        <SignIn/>
        <SignUp/>
        <SignOut/>
        <Cart/>
        <main style="flex: 1 0 auto;" class="mb-5">
            <router-view></router-view>
        </main>
        <footer>
            <Footing/>
        </footer>
    </div>
</template>

<script>
    import Navigation from './components/navigation'
    
    import Footing from './components/Footer'
    import SignIn from './components/signin'
    import SignUp from './components/signup'
    import Cart from './components/cart'
    import SignOut from './components/sub/signout'
    

    export default {

        components: {
            Navigation,Footing,SignIn,SignUp,Cart,SignOut
        },
        data(){
            return {
    
            }
        },
        methods:{

        },
        mounted(){
            this.$store.dispatch('cart/retrieveCartItems')
            this.$store.dispatch('auth/initUser')
            

            // this.$gAuth.getAuthCode()
            //     .then(authCode => {
            //     //on success
            //     return this.$http.post('/auth/login/google', { code: authCode, redirect_uri: '/auth/callback/google' })
            //     })
            //     .then(response => {
            //         console.log("SUCCESS");
                    
            //     })
            //     .catch(error => {
            //     console.log("ERROR");
            //     })

            
            
        },
        

    }
</script>
