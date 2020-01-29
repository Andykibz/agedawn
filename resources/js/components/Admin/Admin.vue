<template>
    <div>
        <navigation></navigation>
        <div id="wrapper">
            <sidebar></sidebar>
            <div id="content-wrapper">

                <div class="container-fluid">
                    <breadcrumb></breadcrumb>
                    <main class="py-4">
                        <router-view></router-view>
                    </main>
                </div>                

                <foot></foot>

            </div>
        </div>
    </div>
</template>

<script>
    import breadcrumb from './components/breadcrumb'
    import cards from './components/cards'
    import foot from './components/footer'
    import navigation from './components/nav'
    import sidebar from './components/sidebar'


    export default {
        components: {
            breadcrumb, cards, foot, navigation,sidebar
        },
    }
</script>
