<template>
    <div class="d-flex flex-column" style="height:100%">
        <navigation></navigation>
        <SignIn/>
        <SignUp/>
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
    import navigation from './components/navigation'
    import Footing from './components/Footer'
    import SignIn from './components/signin'
    import SignUp from './components/signup'
    import Cart from './components/cart'
    
    

    export default {

        components: {
            navigation,Footing,SignIn,SignUp,Cart
        },
        mounted(){
            this.$store.dispatch('cart/retrieveCartItems')
        },
        

    }
</script>
