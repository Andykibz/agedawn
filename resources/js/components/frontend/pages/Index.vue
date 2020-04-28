<template>
    <div id="homeWrapper">
        <homehero ></homehero> 

        <herocards></herocards>

        <div class="site-block-3 py-5">
                <div class="container">
                    <div class="row">
                        <div class="mx-auto px-2">
                            <div class="quote text-center">
                                <font-awesome-icon icon="quote-right" size="2x"/>
                            </div>
                            <blockquote class="blockquote">
                                <p class="mb-0">Behold, I am doing a new thing; now it springs forth, do you not perceive it?</p>
                                <footer class="blockquote-footer">Yahweh <cite title="Source Title">Isaiah 43:19</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
        </div>
        <hr class="m-0 p-0 bg-secondary">
        <!-- <Music /> -->
        <parallax text="New Beginnings" image="performance.jpg"/>
        <Posts />
        <hr class="m-0 p-0 bg-secondary">
        <parallax text="Check out our Merch" image="shop.jpg"/>
        <Store/>
        <!-- <hr class="m-0 p-0 bg-secondary"> -->


    </div>
</template>

<script>
    import herocards from '../components/sub/herocards'
    import homehero from '../components/homehero'
    import parallax from '../components/parallaxbg'
    import Music from '../components/music'
    import Posts from '../components/posts'
    import Store from '../components/store'
    


    export default {
        name: "Home",
        components:{
            herocards, Music, homehero, parallax, Posts, Store
        },
        data(){
            return{
            
            }
        },
        methods: {

        },
        mounted(){
            // window.siteStellar()
        },
        beforeMount(){
            this.$store.dispatch('getAdawnageAction')
            
            // window.alert(23)
        }
        
    }
</script>
<style scoped>
    .site-blocks-cover{
        overflow: hidden;
    }
    .blockquote{
        position: relative;
        padding-top: .6em;
    }
    .blockquote:after{
        margin-top: 1em;
        position: absolute;
        background: rgba(161, 152, 152, 0.829);
        width: 60px;
        height: 2px;
        content: '';
        margin-left: -30px;
        left: 50%;
        /* @include transform(translateX(-50%)); */
        bottom: 0;
    }
</style>
