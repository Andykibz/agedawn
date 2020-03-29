<template>
    <div class="d-flex flex-column" style="height:100%">
        <navigation></navigation>
        <SignIn/>
        <SignUp/>
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
    

    export default {
        components: {
            navigation,Footing,SignIn,SignUp
        },
        
    }
</script>
