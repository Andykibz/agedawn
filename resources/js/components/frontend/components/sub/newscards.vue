<template>
    <div class="col-sm-6 col-12 news-feature-wrapper">
        <div v-for="article in articles" :key="article.id" 
            class="row news-feature mb-4 "
            data-aos="fade-up-right">
            <div class="img-holder-wrapper col-6 px-0">
                <div class="img-holder ">
                    <!-- :style="{'background-image':'url('+article.img+')'}"> -->
                    <img class="img-fluid" :src="article.img" alt="">
                </div>
            </div>
                
            <div class="content-holder col-6">

                <div class="content-holder-overlay" >
                    <span class="overlay-content" >
                    <span><button class="butn butn-orange butn-border-o">Read</button></span>

                    </span>
                </div>

                <h4 class="d-flex flex-row bd-highlight justify-content-between align-items-center">
                    <span>~</span>
                    <span>
                        {{ article.title }}
                    </span>
                    <span>~</span>
                </h4>
                <hr class="p-0 m-0 bg-dark">
                <span class="excerpt">
                    <p>{{ article.excerpt }}</p>
                </span>
                <span></span>

            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "NewsCard",
    data(){
        return{
            articles:[
                {
                    "title"     : "The Lord is my shepherd",
                    "excerpt"   : "Progressively promote diverse deliverables vis-a-vis goal-oriented users. Objectively drive orthogonal e-commerce whereas.",
                    "img"       : "storage/Articles/thumbs/interior.png",
                    "date"      : "4 months ago"
                },
                {
                    "title"     : "I shall not want",
                    "excerpt"   : "Progressively promote diverse deliverables vis-a-vis goal-oriented users. Objectively drive orthogonal e-commerce whereas.",
                    "img"       : "storage/Articles/thumbs/gallery-img2.jpg",
                    "date"      : "3 months ago"
                },
                {
                    "title"     : "Though I wak through the Valley",
                    "excerpt"   : "Progressively promote diverse deliverables vis-a-vis goal-oriented users. Objectively drive orthogonal e-commerce whereas.",
                    "img"       : "storage/Articles/thumbs/gallery-img4.jpg",
                    "date"      : "3 months ago"
                }
            ]   
        }
    }
}
</script>
<style scoped>
.news-feature{        
    position: relative;
    display: flex;
    flex-direction: row;
    min-height: 200px;
    background-color: rgba(29, 26, 26, 0.7);
    box-shadow: 0 4px 8px 0 rgba(196, 193, 193, 0.2), 0 6px 20px 0 rgba(221, 218, 218, 0.19);

    /* cursor: pointer; */
}

.news-feature:focus .img-holder,.news-feature:hover .img-holder {
    transform-origin: center;
    transform: scale(1.2);
}

.img-holder-wrapper{
    display: block;
    overflow:hidden;
    height: 200px;
}

.img-holder{
    transition: all .2s;
    background-attachment:scroll;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-color: black;
    height: inherit;
}
.img-holder img{
    height: 100%;
    width: 100%;
}

.content-holder{
    color: aliceblue;
    position: relative;
    font-family: 'Times New Roman', Times, serif;
    font-size: 1.1em;
    font-style: italic;
    line-height: 1.5
}

.content-holder-overlay{
    width: 100%;
    opacity: 0;
    height:100%;
    position: absolute;
    content: "";
    left: 0;
    bottom: 0;
    right: 0;
    top: 0;
    background:rgba(0, 0, 0, 0.4);
    transition: all .2s ease-in;
    /* display: none; */
}

.content-holder-overlay:hover{
    opacity: 1;
}

.show{
    display: block;
}

span.overlay-content{
    position: absolute;
    margin: auto;
    content: "";
    right: 50%;
    top: 50%;
    transform: translate(50%);
}

h4{
    font-family: 'Times New Roman', Times, serif;
    color: aliceblue;
    text-align: center;
}
</style>