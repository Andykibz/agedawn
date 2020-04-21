<template>
<div class="">
    <div class="row d-flex justify-content-center mb-4">
        <div class="col-lg-7 col-md-8 col-sm-11 col-12 mb-3 "> 
        <h4 class="text-light mb-3">Leave a Review</h4>
            <star-rating class="mb-2" v-model="rating" :star-size="20" :show-rating="true" 
            border-color="transparent" active-color="#f6993f"></star-rating>
            <editor-menu-bar class="mb-2" :editor="editor" v-slot="{ commands, isActive }">
                <div class="menubar">
                    <button
                        class="menubar__button"
                        :class="{ 'is-active': isActive.bold() }"
                        @click="commands.bold">
                            <i class="icon-bold"></i>
                    </button>

                    <button class="menubar__button":class="{ 'is-active': isActive.italic() }"
                        @click="commands.italic"> <i class="icon-italic"></i> </button>

                    <button class="menubar__button" :class="{ 'is-active': isActive.strike() }"
                        @click="commands.strike"> <i class="icon-strikethrough"></i> </button>

                    <button class="menubar__button" :class="{ 'is-active': isActive.underline() }"
                        @click="commands.underline"> <i class="icon-underline"> </i> </button>

                    <button class="menubar__button" :class="{ 'is-active': isActive.paragraph() }"
                        @click="commands.paragraph"> <i class="icon-paragraph"></i> </button>

                    <button class="menubar__button" :class="{ 'is-active': isActive.bullet_list() }"
                        @click="commands.bullet_list"> <i class="icon-format_list_bulleted"></i> </button>

                    <button class="menubar__button" :class="{ 'is-active': isActive.ordered_list() }"
                        @click="commands.ordered_list"> <i class="icon-format_list_numbered"></i> </button>
                </div>
            </editor-menu-bar>
            <editor-content class="editor__review mb-1" :editor="editor" />
            <!-- <button role="button" class="btn btn-sm btn-outline-success btn-square d-flex flex-row-reverse "> Submit </button> -->
            <div class="div">

            <a @click.prevent="submitReview" role="button" href="#" class="btn btn-sm animated-button sandy-two">Submit</a>
            </div>
        </div>
    </div>
  <div class="col-md-8 col-12">
    <div class="row">

            <div style="width:100%" class="commentsWrapper mb-5">
              <h4 class="text-light mb-3">Review(s) on {{ product.name }}</h4>
              <template v-if="reviews">
                <div v-for="review in reviews" :key="review.id" class="timeline-item position-relative" :date-is="created_date( review.created)" >
                    
                    <template v-if="user">
                        <i v-if="user.id == review.user[0].id " @click="delReview( review.id )" style="right:5px;cursor:pointer" class="btn-sm btn-outline-warning position-absolute left icon-trash"> </i>
                    </template>
                    <!-- {{ review }} -->
                    <h5 class="d-flex">
                        {{ review.user[0].name }}
                        <star-rating class="ml-3" :read-only="true" :rating="review.rating" :star-size="10" :show-rating="false" border-color="transparent" active-color="#f6993f"></star-rating>
                    </h5>
                    <div class="py-2 px-3 review-content" v-html="review.reviews">
                        
                    </div>
                </div>
              </template>
              <template v-if="!reviews">
                  <div  class="py-4 d-flex flex-row justify-content-center">
                      <h5 class="text-secondary"> <em> No reviews have been published yet </em> </h5>
                  </div>
              </template>      
            </div>
        </div>  
  </div>
</div>
</template>

<script>
import { mapActions } from 'vuex'
import { Editor, EditorContent,EditorMenuBar } from 'tiptap'
import { HardBreak, HorizontalRule, OrderedList, BulletList, ListItem, Bold, Italic, Link, Strike, Underline, Placeholder } from 'tiptap-extensions'
import StarRating from 'vue-star-rating'
import { mapGetters } from 'vuex'
export default {
    name    :    "Reviews",
    props   :   { product : Object },
    computed:   {
        ...mapGetters({
            reviews :   'shop/getReviews',
            user    :   'auth/user'
        })
    },
    components:{ EditorContent,EditorMenuBar, StarRating },
    data(){
        return{
            
            rating: null,
            content : null,
            editor : new Editor({
                content: "<p></p>",
                onUpdate: () => this.content = this.editor.getHTML(),
                extensions: [
                    new BulletList(),
                    new HorizontalRule(),
                    new ListItem(),
                    new OrderedList(),
                    new Link(),
                    new Bold(),
                    new Italic(),
                    new Strike(),
                    new Underline(),
                    new Placeholder({
                        emptyEditorClass: 'is-editor-empty',
                        emptyNodeClass: 'is-empty',
                        emptyNodeText: 'What is your take?...',
                        showOnlyWhenEditable: true,
                        showOnlyCurrent: true,
                    }),
                ]
            }),
            // reviews : [],

        }
    },
    methods:{

        ...mapActions({
            getReviewsAction    :   'shop/queryReviews',
        }),

        created_date( date ){
            let months = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec' ]
            let month   = months[new Date(date).getUTCMonth()]
            let year    = String( new Date(date).getUTCFullYear() ).replace('20',"'")
            return `${month} ${new Date(date).getUTCDate()} ${year}`
        },
        submitReview(){
            let reviewForm = new FormData();
            reviewForm.set('rating',this.rating)
            reviewForm.set('review',this.content)
            let self = this
            axios.post(`/api/product/${this.product.id}/rate`,reviewForm)
                .then((response)=>{
                    self.editor.clearContent();
                    self.rating=null;
                    // console.log(response.data);
                    this.getReviewsAction(this.$route.params.id)
                })  
                
                .catch((err)=>{
                    console.log(err.response.data);                    
                })
        },

        getReviews(){
            self =  this
            axios.get(`/api/product/${this.product.name}/reviews`).then((response)=>{
                self.reviews = response.data.reviews
            });
        },
        delReview( review ){
            let delRev = new FormData()
            console.log(this.user.id);
            
            delRev.set('user',this.user.id)
            axios.delete(`/api/product/${review}/review/`, {data : { user: this.user.id }})
            .then((response)=>{
                // console.log(response.data);
                this.getReviewsAction(this.$route.params.id)
                
            }).catch((err)=>{
                console.log(err.response.data);
            });
        }
    },
    mounted(){
        // this.getReviews()
    },
    beforeDestroy() {
        this.editor.destroy()
    },
}
</script>
<style>

.ProseMirror-focused{
            outline: none !important;
        }
.editor__review .ProseMirror{
    height: 100% !important;
    width: 100% !important;
}
</style>
<style lang="scss" scoped>
    
    .btn{
        border-radius: 0px !important;
    }
    p.is-empty.is-editor-empty::before {
            content: attr(data-empty-text);
            float: left;
            color: #aaa !important;
            pointer-events: none;
            height: 0;
            font-style: italic;
    }

    .menubar__button{
        font-weight: 700;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        background: transparent;
        border: 0;
        color: aliceblue;
        padding: .2rem .5rem;
        margin-right: .2rem;
        border-radius: 3px;
        cursor: pointer;
    }
    .editor__review{
        min-height: 20vh;
        // background: rgba($color: #000000, $alpha: .3);
        border-radius: 4px;
        border-bottom: 1px solid #aaa;
        display: flex;
        // align-content: flex-end;
        // align-items: flex-end;
        -webkit-box-shadow: -1px 0px 5px 0px rgba(12, 12, 12, 0.75);
        -moz-box-shadow: -1px 0px 5px 0px rgba(12, 12, 12, 0.75);
        box-shadow: -1px 0px 5px 0px rgba(0,0,0,0.75);
        background-color: rgba($color: #0c0c0c, $alpha: .3);
        padding: 1rem .8rem;
        margin-right: .2rem;
        border-radius: 3px;
        *:focus{
            border: none !important;
            outline: none !important;
        }
        strong{
            font-weight: bold !important;
        }

        
        ::selection{
            background-color: #aaa !important;
        }
    }

    .ProseMirror:focus, .ProseMirror-focused{
        outline: none !important;
        &::selection{
            background-color: aliceblue;
        }
    }
    /* Global Button Styles */
    a.animated-button.sandy-two {
        border: 2px solid #f6993f;
        color: #FFF;
    }
    a.animated-button.sandy-two:after {
        border: 3px solid #f6993f;	
    }

.commentsWrapper{
    h3,h4,h5{font-family: 'Ubuntu', serif ;}
    h5 {
        font-size: 1.3rem;
        margin-bottom: .44em;
        color: aliceblue;
    }

    p {
        // font-family: 'Roboto', sans-serif;
        font-size: 1rem;
    }

    $border-color: rgba(black, .3);

    .timeline-item {
        padding: 3em 2em 2em;
        position: relative;
        color: rgba(black, .7);
        border-left: 2px solid $border-color;
        .review-content{
            -webkit-box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0); 
            box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0);
            border-radius: 8px;
        }

        &::before {
            content: attr(date-is);
            position: absolute;
            color: #aaa;
            left: 2em;
            font-weight: bold;
            top: 1em;
            display: block;
            font-weight: 700;
            // font-size: .785rem;
        }

        &::after {
            width: 10px;
            height: 10px;
            display: block;
            top: 1em;
            position: absolute;
            left: -7px;
            border-radius: 10px;
            content: '';
            border: 2px solid $border-color;
            background: white;
        }

        &:last-child {
            border-image: linear-gradient(
                to bottom,
                $border-color 60%,
                rgba($border-color, 0)) 1 100%
            ;
        }
    }
}

</style>