<template>
    <div >
        <div v-if="isAdmin">
            <navigation></navigation>
            <div  id="wrapper">
                <sidebar></sidebar>
                <div id="content-wrapper">

                    <div  class="container-fluid">
                        <!-- <breadcrumb></breadcrumb> -->
                        <main class="py-4">
                            <router-view></router-view>
                        </main>
                    </div>                

                    <foot></foot>

                </div>
            </div>

        </div>
        <div v-else class="Err401">
            <div class="content d-flex justify-content-center align-items-center">

            <h1 class="heading text-light ">
                Unauthorised Access! Error 401!!!
            </h1>
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
    import { mapGetters } from 'vuex'

    export default {
        components: {
            breadcrumb, cards, foot, navigation,sidebar
        },
        computed:{
            ...mapGetters({
                isAdmin:'auth/admin'
            })
        },
        methods:{
        },
        beforeCreate(){
            this.$store.dispatch('auth/initUser');   
        }
    }
</script>

<style lang="scss" scoped>
.Err401{
    position: absolute;
    width: 100%;
    height: 100%;
    background-image: url('/imgs/admin/forbidden.jpg');
    background-repeat: no-repeat;
    background-size: 100% auto;
    .content{
        position: relative;
        display: block;
        height: inherit;
        width: inherit;
        h1{
            font-family: 'Courier New', Courier, monospace;
            text-shadow: 3px 3px 3px  #333;
        }
    }

}
</style>
