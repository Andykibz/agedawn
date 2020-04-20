<template>
    <div>
        <Hero :heading="`Wanna get in touch ?`" />
        <div class="container mt-5">
            <div class="section_title text-center col-12 mb-5"  data-aos="fade-in">
                <h2>Reach Us</h2>
                <p>Get in Touch</p>
            </div>
            <div class="row mb-5">
        
                <main class="col-md-7 col-12 mx-auto" >
                   <section id="contactForm" class="contact-box col-md-10 col-12 mx-auto" data-aos="slide-up">
                       <form @submit.prevent="submitContactUs" class="contact" id="reachus-form">
                           <input v-model="msg.name" autocomplete="off" type="text" placeholder="Name" required>
                           <small class="text-danger" v-text="errs.name"></small>
                           <input v-model="msg.email" autocomplete="off" type="email" placeholder="Email" required>
                           <small class="text-danger" v-text="errs.email"></small>
                           <input v-model="msg.subject" autocomplete="off" type="subject" placeholder="Subject" required>
                           <small class="text-danger" v-text="errs.subject"></small>
                           <div class="editor">
                                <editor-menu-bubble :editor="editor" :keep-in-bounds="keepInBounds" v-slot="{ commands, isActive, menu }">
                                    <div class="menububble" :class="{ 'is-active': menu.isActive }"
                                        :style="`left: ${menu.left}px; bottom: ${menu.bottom}px;`">

                                        <button class="menububble__button" :class="{ 'is-active': isActive.bold() }"
                                        @click.prevent="commands.bold">
                                            <i class="icon-bold"></i>
                                        </button>

                                        <button class="menububble__button" :class="{ 'is-active': isActive.italic() }"
                                        @click.prevent="commands.italic" > 
                                            <i class="icon-italic"></i> 
                                        </button>


                                    </div>
                                </editor-menu-bubble>
                                <editor-content class="editor__message" :editor="editor" />
                                <small class="text-danger" v-text="errs.content"></small>

                           </div>
                           <button type="submit" role="submit" class="submitForm"> <span>Submit</span> </button>
                       </form>
                    </section> 
                </main>
            </div>
            
        </div>
        
    </div>
</template>
<script>
import Hero from '../components/hero'
import { Editor,EditorContent,EditorMenuBubble } from 'tiptap'
import { BulletList, ListItem, OrderedList,Bold, Italic, Link, Strike, Underline,Placeholder  } from 'tiptap-extensions'
export default {
    name : "ReachUs",
    props : [''],
    components : { Hero, EditorContent, EditorMenuBubble },
    data(){
        return{
            
            errs:{
                name    : null,
                email   : null,
                subject : null,
                content : null,
            },
            msg :{
                name    : null,
                email   : null,
                subject : null,
                content : null,
            },  
            keepInBounds: true,
            editor : new Editor({
                content: "<p></p>",
                onUpdate:()=>{ this.msg.content = this.editor.getHTML() },
                extensions: [
                    new BulletList(),
                    new ListItem(),
                    new OrderedList(),
                    new Link(),
                    new Bold(),
                    new Italic(),
                    new Strike(),
                    new Underline(),
                    new Placeholder({
                            emptyEditorClass: 'is-editor-empty text-center d-blockd-block',
                            emptyNodeClass: 'is-empty text-center d-block',
                            emptyNodeText: 'Your Message...',
                            showOnlyWhenEditable: true,
                            showOnlyCurrent: true,
                        }),
                ]
            })
        }
    },
    methods:{
        submitContactUs(){
            let self = this
            let reachus = new FormData()
            
            reachus.set('name',self.msg.name)
            reachus.set('email',self.msg.email)
            reachus.set('subject',self.msg.subject)
            reachus.set('content',self.msg.content)
            axios.post('/api/reachus', reachus)
                .then((reponse)=>{
                    self.msg.name = null
                    self.msg.email = null
                    self.msg.subject = null                    
                    self.editor.content = null
                    self.editor.clearContent()
                })
                .catch((err)=>{
                    console.log(err.response.data);
                    let errors = err.response.data.errors
                    ( errors['name'] != undefined ) ? this.errs.name = errors['name'][0] : '';
                    ( errors['email'] != undefined ) ? this.errs.email = errors['email'][0] : '';
                    ( errors['subject'] != undefined ) ? this.errs.subject = errors['subject'][0] : '';
                    ( errors['content'] != undefined ) ? this.errs.content = errors['content'][0] : '';
                });
        },
    },
    mounted(){
        
    },
    beforeDestroy(){
        this.editor.destroy()
    }
    
}
</script>
<style lang="scss">
    p#placeholder{ color: rgb(77, 75, 75) !important; }
    p.is-empty.is-editor-empty::before {
        content: attr(data-empty-text);
        float: left;
        color: rgb(68, 62, 62) !important;
        pointer-events: none;
        height: 0;
        font-style: italic;
        text-align: center !important;
    }

    input::placeholder {
        padding-left: 10px;
    }

    p.is-empty.is-editor-empty::before {
        content: attr(data-empty-text);
        float: left;
        color: #aaa !important;
        pointer-events: none;
        height: 0;
        font-style: italic;
        text-align: center !important;
        padding-left: 10px;
    }
    .editor__message{
        border-bottom: 1px solid;
        text-align: center;
        min-height: 10vh;
        p.is-editor-empty{ text-align: center !important; }
        p{
            text-align: center !important;
        }
        strong{ font-weight: bold !important; }
        .ProseMirror{   width: 100%; height: 100%; }
        ::selection{ background-color: #aaa !important; }
    }
    .menububble__button {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        background: transparent;
        border: 0;
        color: #fff;
        padding: .2rem .5rem;
        margin-right: .2rem;
        border-radius: 3px;
        cursor: pointer;
    }

.contact-box {
    background-image: url('/imgs/reach.jpg');
    background:url('/imgs/handreach.jpg'), rgba(#000000,.1);
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    -webkit-box-shadow: -1px 0px 5px 0px rgba(12, 12, 12, 0.75);
    -moz-box-shadow: -1px 0px 5px 0px rgba(12, 12, 12, 0.75);
    box-shadow: -1px 0px 5px 0px rgba(0,0,0,0.75);
    border-radius: 4px;    
    padding: 2em 0;
    text-align: center;
    ::selection{
        background-color: aliceblue !important;
    }
    h2 {
        margin: 0 0 .85em 0;
        font-weight: 100;
        font-size: 30px;
    }
    .contact {
        width: 100%;
        max-width: 500px;
        margin: auto;
        input {
            width: 100%;
            background: transparent;
            border: 0;
            border-bottom: 1px solid;
            padding: .8em 0 .8em;
            margin-bottom: .4em;
            text-align: center;
            font-size: 16px;
            font-family: inherit;
            font-weight: 300;
            line-height: 1.5;
            color: inherit;
            outline: none;
            color: #f2f1f2;
            &::placeholder { 
                font-style: italic;
                color: #bba2aa;
                text-align: left;
                font-family: "Times New Roman", Times, serif;
            }
        }

        button.submitForm {    
            all: unset;
            margin-top: 2.4em;
            background: transparent;
            border: 2px solid #f6993f;
            padding: .8em 4em;
            // border-radius: 50px;
            cursor: pointer;
            display: inline-block;
            font-weight: 700;
            position: relative;
            transition: all 300ms ease;
            span {
                display: inline-block;
                transition: all 300ms ease;
                //z-index: 2;
            }
            &:before, &:after {
                content: "";
                display: block;
                position: absolute;
                transition: all 300ms ease;
                opacity: 0;
            }
            &:before {
                height: 7px;
                width: 7px;
                background: transparent;
                border-right: 2px solid;
                border-top: 2px solid;
                right: 30px; top: 21px;
                transform: rotate(45deg);
            }

            &:hover {
                span {
                    transform: translateX(-10px);
                }
                &:before {
                    opacity: 1;
                }

            }
        }
    }

}







    
</style>
