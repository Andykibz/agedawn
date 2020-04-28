<template>
    <div class="row">
        <div class="col-12"><h5>Videos</h5></div>
        <div class="row">
            <div v-for="(video, index) in videos" :key="video.url" class="col-6 ">
                <div class="row border m-1 pb-1">
                    <div class="col-lg-6 col-12">
                        <div class="row">
                            <div class="col-12" :id="`video-${index}`">
                                <label :for="`title-${index}`">Title</label>
                                <input :id="`title-${index}`" type="text" class="form-control mb-1" v-model="video.title">
                            </div>
                            <div class="col-12" :id="`video-${index}`">
                                <label :for="`url-${index}`"></label>
                                <input :id="`url-${index}`" type="text" class="form-control mb-1" v-model="video.url">              
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <label :for="`description-${index}`">Description</label>
                        <textarea :id="`description-${index}`" type="text" class="form-control mb-2" v-model="video.description"></textarea>
                        <i @click="saveVideo" class="btn btn-sm btn-outline-dark fa fa-save"></i> 
                    </div>
                </div>            
            </div>
        </div>

        <!-- <div class="col-12"><h5>Hero Text</h5></div> -->
        <div class="col-12"><hr></div>
        <!-- <div class="form-group">
            <div class="input-group mb-3">
                <label for="herotext"> Hero Text </label>
                <input id="herotext" type="text" class="form-control mb-1" v-model="herotext" placeholder="Hero Text">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                </div>
            </div>
        </div> -->
        <div class="px-3">
            <div class="form-group">
                    <label for="herotext"> Hero Text </label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" v-model="herotext" aria-label="Hero Text">
                    <div class="input-group-append">
                        <button @click.prevent="saveMetas('herotext',herotext)" class="btn btn-outline-secondary" type="button" id="button-addon2"> <i class="fa fa-save"></i> </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-12">
            
            <input id="herotext" type="text" class="form-control mb-1" v-model="herotext">
        </div> -->
    </div>
</template>

<script>
export default {
    name    : 'Metas',
    props   : [],
    data(){
        return{
            videos      : null,
            herotext    : null,
        }
    },
    methods:{
        getMetas(){
            let self = this
            axios.get('/api/getHomeInfo').then((response)=>{
              //  response.data
              console.log(response.data);
                self.herotext = response.data[1].value                              
            });
            axios.get('/api/getHomeInfoArr').then((response)=>{
                self.videos = response.data.data[1].data
                console.log(self.videos);
            });
        },
        saveVideo(){
            axios.post('/api/admin/saveVideos', {'videos' : this.videos} )
            .then(( response )=>{
               console.log( response.data );               
            }).catch((err)=>{
                console.log(err.response.data);
            });
        },
        saveMetas( key ,value ){
            axios.put(`/api/admin/metasave/${key}`,{ name: key, value: value })
                .then((response)=>{
                    console.log(response.data)
                })
                .catch((err)=>{
                    console.log(err.response.data);                    
                })
        }
    },
    mounted(){
      this.getMetas()
    }
}
</script>

<style>

</style>