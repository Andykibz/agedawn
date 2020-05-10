<template>
    <div>
        <div id="accoclades">
            <label style="font-size:x-large;">Accolades</label>
            <div class="accolades">
                <div v-for="(accolade,index) in accolades" :key="index">
                    <form class="form-inline">
                        <label class="sr-only" :for="`name-${index}`">Name</label>
                        <input v-model="accolade.data.name" type="text" class="form-control mb-2 mr-sm-2" :id="`name-${index}`" placeholder="Name of the Awards">

                        <label class="sr-only" :for="`title-${index}`">Title</label>
                        <input v-model="accolade.data.title" type="text" class="form-control mb-2 mr-sm-2" :id="`title-${index}`" placeholder="Title">

                        <label class="sr-only" :for="`year-${index}`">Year</label>
                        <input v-model="accolade.data.year" type="text" class="form-control mb-2 mr-sm-2" :id="`year-${index}`" placeholder="Year">

                        <div class="form-check mb-2 mr-sm-2">
                            <input v-model="accolade.data.scooped" class="form-check-input" type="checkbox" :id="`scooped-${index}`">
                            <label class="form-check-label" :for="`scooped-${index}`">
                                Scooped
                            </label>
                        </div>
                        <button type="submit" class="btn btn-info btn-sm mb-2 mr-1">Update</button>
                        <button type="submit" class="btn btn-danger btn-sm mb-2 mr-1">Delete</button>
                    </form>
                </div> 
                <form @submit.prevent="addAcc" id="newAccolade" class="form-inline">
                        <label class="sr-only" :for="`name`">Name</label>
                        <input v-model="accolade.name" type="text" class="form-control mb-2 mr-sm-2" :id="`name`" placeholder="Name of the Awards">

                        <label class="sr-only" :for="`title`">Title</label>
                        <input v-model="accolade.title" type="text" class="form-control mb-2 mr-sm-2" :id="`title`" placeholder="Title">

                        <label class="sr-only" :for="`year`">Year</label>
                        <input v-model="accolade.year" type="text" class="form-control mb-2 mr-sm-2" :id="`year`" placeholder="Year">

                        <div class="form-check mb-2 mr-sm-2">
                            <input v-model="accolade.scooped" class="form-check-input" type="checkbox" :id="`scooped`">
                            <label class="form-check-label" :for="`scooped`">
                                Scooped
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mb-2 mr-1">Add</button>
                    </form>
            </div>
        </div>

        <div id="discographies" class="pl-3">
            <label style="font-size:x-large;">Discographies</label>
            <div class="row">
                <div class="col-md-5 col-12 list-group">
                    <a href="#" v-for="(discog,index) in discographies" :key="index" class="list-group-item list-group-item-action" @click.prevent="setDiscog(discog)">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{discog.data.title}}</h5>
                            <small>{{ discog.data.release }}</small>
                        </div>
                        <!-- <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> -->
                        <small>Tracks : {{ discog.data.tracks }}</small>
                    </a>
                </div>
                <div class="col-md-7 col-12">
                    <div class="form-row mb-2">
                        <div class="col">
                            <input v-model="discography.type" type="text" class="form-control col-12" placeholder="Type">
                        </div>
                        <div class="col">
                            <input v-model="discography.release" type="text" class="form-control col-12" placeholder="Release Date">
                        </div>
                        <div class="col">
                            <input v-model="discography.tracks" type="text" class="form-control col-12" placeholder="Tracks">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <input v-model="discography.title" type="text" class="border form-control col-12" placeholder="Title">
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <ckeditor @change="handling" :editor="editor" v-model="discography.description" ></ckeditor>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    name    : '',
    data(){
        return{
            accolade     : {
                name    : null,
                title   : null,
                year    : null,
                scooped : false,
            },
            discogId    : null,
            editor      : ClassicEditor,
            discography : {
                title   : '',
                release : '',
                tracks  : '',
                type    : '',
                image   : '',
                description : ''
            },
            accolades       : [],
            discographies   : [],
            about           : '',
        }
    },
    methods: {
        
        getAccolades() {
            axios.get("/api/metas/accolades").then(response => {
                this.accolades = response.data.data;                
            });
        },
        getAbout() {
            axios.get("/api/metas/about-us").then(response => {
                this.about = response.data.data;
            });
        },
        getDiscographies() {
            axios.get("/api/metas/discography").then(response => {
                this.discographies = response.data.data;
            });
        },
        addAcc(){
            axios.get("/api/admin/metas/discog").then(response => {
                this.discographies = response.data.data;
            });
        },
        updateAcc(){
            axios.get("/api/admin/metas/discog").then(response => {
                this.discographies = response.data.data;
            });
        },
        delAcc( type ){
            axios.get("/api/metas/discography").then(response => {
                this.discographies = response.data.data;
            });
        },
        setDiscog( discog ){
            console.log(discog);
            
            this.discography = discog.data
        },
        handling(){
            if(editorData.lengh < 1){   
                this.discography.description =   "Description is empty"
            }
        },
    },
    mounted(){
        this.getAccolades()
        // this.getAbout()
        this.getDiscographies()
    }

}
</script>

<style lang="scss" scoped>
    #accolades input{
        border: none;
        border-bottom: 1px solid #aaa;
        &:focus{
            border: 1px solid #aaa
        }
    }

</style>