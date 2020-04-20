<template>
<div class="row d-flex justify-content-center">


  <div class="col-md-8 col-sm-11 col-12 mb-4">
      <h4 class="text-light mb-3">Leave a Comment</h4>
      <editor-menu-bar class="mb-2" :editor="editor" v-slot="{ commands, isActive }">
            <div class="menubar">
                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.bold() }"
                    @click="commands.bold">
                        <i class="icon-bold"></i>
                </button>

                <button
                class="menubar__button"
                :class="{ 'is-active': isActive.italic() }"
                @click="commands.italic"
                >
                <i class="icon-italic"></i>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.strike() }"
                    @click="commands.strike">
                        <i class="icon-strikethrough"></i>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.underline() }"
                    @click="commands.underline">
                        <i class="icon-underline"> </i>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.paragraph() }"
                    @click="commands.paragraph">
                        <i class="icon-paragraph"></i>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.bullet_list() }"
                    @click="commands.bullet_list">
                <i class="icon-format_list_bulleted"></i>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.ordered_list() }"
                    @click="commands.ordered_list">
                        <i class="icon-format_list_numbered"></i>
                </button>
            </div>
        </editor-menu-bar>
        <editor-content class="editor__content mb-1" :editor="editor" />
        <!-- <button role="button" class="btn btn-sm btn-outline-success btn-square d-flex flex-row-reverse "> Submit </button> -->
        <div class="div">

        <a role="button" href="#" class="btn btn-sm animated-button sandy-two">Submit</a>
        </div>
  </div>
  <div class="col-md-8 col-12">
    <div class="row">

            <div class="commentsWrapper mb-5">
              <h4 class="text-light mb-3">Comment(s) on {{ news.title }}</h4>
                <div class="timeline-item" date-is='20-07-1990'>
                    <h5 class="d-flex">
                        Andrew Kibor
                    </h5>
                    <div class="py-2 px-3 review-content">
                        <p>
                            I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. I write the best placeholder text, and I'm the biggest developer on the web by far... 
                        </p>
                    </div>
                </div>       
        
            </div>
        </div>  
  </div>
  </div>
</template>

<script>
import { Editor, EditorContent,EditorMenuBar } from 'tiptap'
import { HardBreak, HorizontalRule, OrderedList, BulletList, ListItem, Bold, Italic, Link, Strike, Underline, Placeholder } from 'tiptap-extensions'
export default {
    name :    "Comments",
    props   :   ['news'],
    components:{ EditorContent,EditorMenuBar }  ,
    data(){
        return{
            rating: 6,
            editor : new Editor({
                content: "<p></p>",
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

        }
    },
    methods:{
        setRating( val ){
            this.rating = val;
        }
    },
    mounted(){
        
    },
    beforeDestroy() {
        this.editor.destroy()
    },
}
</script>
<style >
.editor__content .ProseMirror{            
    width: 100% !important;
    height: 100% !important;
}
    
.editor__content p.is-empty.is-editor-empty::before {
    content: attr(data-empty-text);
    float: left;
    color: rgb(68, 62, 62) !important;
    pointer-events: none;
    height: 0;
    font-style: italic;
    text-align: center !important;
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
    .editor__content{
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
        
        
    }

    
    .ProseMirror:focus, .ProseMirror-focused{
        outline: none !important;
        &::selection{
            background-color: aliceblue;
        }
    }
    /* Global Button Styles */
a.animated-button:link, a.animated-button:visited {
	position: relative;
	display: block;
	margin: 10px auto 0;
	padding: 8px 5px;
	color: #fff;
	font-size:14px;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	overflow: hidden;
	letter-spacing: .08em;
	border-radius: 0;
	text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
	-webkit-transition: all 1s ease;
	-moz-transition: all 1s ease;
	-o-transition: all 1s ease;
	transition: all 1s ease;
}
a.animated-button:link:after, a.animated-button:visited:after {
	content: "";
	position: absolute;
	height: 0%;
	left: 50%;
	top: 50%;
	width: 100%;
	z-index: -1;
	-webkit-transition: all 0.75s ease 0s;
	-moz-transition: all 0.75s ease 0s;
	-o-transition: all 0.75s ease 0s;
	transition: all 0.75s ease 0s;
}
a.animated-button:link:hover, a.animated-button:visited:hover {
	color: #FFF;
	text-shadow: none;
}
a.animated-button:link:hover:after, a.animated-button:visited:hover:after {
	height: 450%;
}

a.animated-button.sandy-two {
	border: 2px solid #f6993f;
	color: #FFF;
}
a.animated-button.sandy-two:after {
	border: 3px solid #f6993f;
	opacity: 0;
	-moz-transform: translateY(-50%) translateX(-50%) rotate(90deg);
	-ms-transform: translateY(-50%) translateX(-50%) rotate(90deg);
	-webkit-transform: translateY(-50%) translateX(-50%) rotate(90deg);
	transform: translateY(-50%) translateX(-50%) rotate(90deg);
}
a.animated-button.sandy-two:hover:after {
	height: 600% !important;
	opacity: 1;
	color: #FFF;
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