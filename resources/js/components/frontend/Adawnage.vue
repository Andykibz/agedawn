<template>
    <div class="d-flex flex-column" style="height:100%">
        <navigation></navigation>
        
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
    

    export default {
        components: {
            navigation,Footing
        },
        
    }
</script>
