<template>
    <div class="discog-wrapper pt-1">
        <div class="album-art-wrapper py-2 d-flex align-items-end" :style="{'background-image':'url(./storage/About/discography/'+discog.image+')'}" data-aos="fade" >
        <div class="px-3 d-flex flex-row justify-content-between discog-meta">
            <h4 class="text-light">
                {{ discog.title }}
                &nbsp;
                <small style="font-size:14px;"> {{ discog.release }} </small>
            </h4>
            <span class="text-light"> <i class="icon-hashtag"></i> {{ discog.tracks }} </span>
        </div>
        <hr class="my-1">
        </div>
        <div class="discog-description-wrapper scrollbar px-3 py-3" id="style-1">
            <div class="discog-description mr-3" v-html="discog.description"></div>
        </div>
      
    </div>
</template>

<script>
export default {
    name    : 'Discography',
    props   :   {
        discog: Object
    }
}
</script>

<style lang="scss" scoped>
    .discog-wrapper{
        max-height: 80vh;
        
    }
    .discog-meta{
        z-index: 9;
        width: 100%;
    }
    .album-art-wrapper{
        height: 300px;
        background-size: cover;
        background-position: center;
        background-origin: content-box;
        text-shadow: 2px 3px 2px #070707;
    }

    .scrollbar
{
	// margin-left: 30px;
    float: left;
    width: 100%;
    max-height: 40vh;
	// background: #F5F5F5;
	overflow-y: scroll;
	margin-bottom: 25px;
}

/*
 *  STYLE 1
 */

#style-1::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar
{
	width: 4px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
}

</style>