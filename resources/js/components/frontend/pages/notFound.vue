<template>
    <div>
        <Hero :heading="`What's up, you ask ?`" />
        <div class="container mt-5 errContainer">
            <SubHero :heading="'Error 404'"/>
            <div class="row mb-5">        
                <main class="col-md-8 col-12 mx-auto text-center" >
                    <p class="lead text-center" title="404">
                        The Requested Page does not Exist!!!
                    </p>
                    <font-awesome-icon icon="exclamation-triangle" size="3x" />
                </main>
            </div>            
        </div>        
    </div>
</template>
<script>
import Hero from '../components/hero'
import SubHero from '../components/subhero'
export default {
    name : "notFound",
    props : [''],
    components : { Hero, SubHero },
    data(){
        return{
         
        }
    },
    methods:{
  
    },
    mounted(){
    },
    
}
</script>
<style lang="scss" scoped>
    .img-wrapper{
        background-origin: content-box;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
        /* background-size: cover; */
        background-size: 100% auto;
        height: 250px;
        width: 100%;
    }
    .readmore{
        font-family: 'Times New Roman', Times, serif;
        color: rgba(#f6993f,0.8);
        font-size: medium;
        &:hover{
            color: rgba(#f6993f,1);
        }
    }

    .errContainer{
        animation: glitch 1s linear infinite;
    }

    @keyframes glitch{
    2%,64%{
        transform: translate(2px,0) skew(0deg);
    }
    4%,60%{
        transform: translate(-2px,0) skew(0deg);
    }
    62%{
        transform: translate(0,0) skew(5deg); 
    }
    }

    div:before,
    div:after{
    content: attr(title);
    position: absolute;
    left: 0;
    }

    div:before{
    animation: glitchTop 1s linear infinite;
    clip-path: polygon(0 0, 100% 0, 100% 33%, 0 33%);
    -webkit-clip-path: polygon(0 0, 100% 0, 100% 33%, 0 33%);
    }

    @keyframes glitchTop{
    2%,64%{
        transform: translate(2px,-2px);
    }
    4%,60%{
        transform: translate(-2px,2px);
    }
    62%{
        transform: translate(13px,-1px) skew(-13deg); 
    }
    }

    div:after{
    animation: glitchBotom 1.5s linear infinite;
    clip-path: polygon(0 67%, 100% 67%, 100% 100%, 0 100%);
    -webkit-clip-path: polygon(0 67%, 100% 67%, 100% 100%, 0 100%);
    }

    @keyframes glitchBotom{
    2%,64%{
        transform: translate(-2px,0);
    }
    4%,60%{
        transform: translate(-2px,0);
    }
    62%{
        transform: translate(-22px,5px) skew(21deg); 
    }
    }
</style>
