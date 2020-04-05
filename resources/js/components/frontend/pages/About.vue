<template>
    <div>
        <Hero :heading="`So what about us ?`" />
        <div class="container about-wrapper mt-5">
            <div class="section_title text-center col-12 mb-5"  data-aos="fade-in">
                <h2>About Us</h2>
                <p>We are Adawnage Band</p>
            </div>
            <div class="row mb-5">
                <aside class="col-sm-4 col-12 about-info"  data-aos="slide-right">
                    <hr class="bg-secondary m-1">
                    <div class="about-sub-section">
                        <h5 class="text-muted">Founded</h5>
                        <span>{{ founded }}</span>
                    </div>
                    <hr class="bg-secondary m-1">
                    <div class="about-sub-section">
                        <h5 class="text-muted">Band Interests</h5>
                        <span>{{ interests }}</span>
                    </div>
                    <hr class="bg-secondary m-1">
                    <div class="about-sub-section">
                        <h5 class="text-muted">Hometown</h5>
                        <span>{{ hometown }}</span>
                    </div>
                    <hr class="bg-secondary m-1">
                    <div class="about-sub-section">
                        <!-- <h5 class="text-muted">Record Label</h5> -->
                        <span>{{ label }}</span>
                    </div>
                    
                    <div class="about-sub-section" data-aos="slide-up-right">
                        <h5 class="text-light">Mission</h5>
                        <!-- <hr class="hr-text" data-content="Mission"> -->
                        <div v-html="mission"></div>
                    </div>
                    <!-- <hr class="bg-secondary m-1"> -->
                    <Social/>

                </aside>
                <main class="col-sm-8 col-12 about-contents"  data-aos="slide-left">
                    <article id="about" v-html="about"></article>
                    <article id="bio">
                        <div class="heading">
                            <h3>Biography</h3>
                        </div>
                        <div v-html="biography"></div>
                        
                    </article>
                    <article id="personal">
                        <div class="heading">
                            <h3>Personal Information</h3>
                        </div>
                        <div v-html="pi"></div>
                    </article>
                </main>
            </div>
            <hr>
            <section id="members">
                <div class="container members">
                    <div class="section_title text-center col-12 mb-5"  data-aos="slide-down">
                        <h3 class="sub-title">Band Artists</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12"  data-aos="slide-up" v-for="member in members" :key="member.id">
                            <div class="card"> <img class="card-img img-fluid" :src="`/storage/About/${member.image}`" :alt="member.name">
                                <div class="card-img-overlay"> <a href="#">
                                    <!-- <img src="assets/img/heart.png" class="heart" alt="heart icon"> -->
                                    </a>
                                    <div class="bottom-text">
                                        <h5 class="card-title">{{ member.name }}</h5>
                                        <p class="card-text">{{ member.role }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</template>
<script>
import Social from '../components/sub/social'
import Hero from '../components/hero'
import { METHODS } from 'http'
export default {
    name        :   "AboutPage",
    components  :   { Social, Hero },
    data(){
        return{
            "founded"           :   "May 28, 2008",
            "interests"         :   "High School Ministry, Concert Tours, Get-aways, Game Drives, Gigging",
            "hometown"          :   "Nairobi, KE",
            "label"             :   "Ageless Music",
            "about"             :   `<p>Adawnage is a fusion of three words A DAWN AGE, backed by Isaiah 43:19 - “Behold, I am doing a new thing; now it springs forth, do you not perceive it?"</p>
                                    <p>Adawnage represents the dawning of a new age, a fresh start, which is what our music and lives are about. We are a unit of young and energetic individuals from different established professional backgrounds with one sole mission of reaching out to the world.
                                    </p>`,
            "mission"           :   "<p>Transforming lives through God-inspired music & lifestyle.</p><p>Our mission is realized through music – positive, electric, realistic and inspirational music. Music is what brought us together. Music was, and still is our common factor.</p",
            "biography"         :   `<p>Adawnage is a Christian contemporary band based in Nairobi, Kenya. May 28th, 2008 was the band's inception. Adawnage was birthed through prayer, fellowship, dedication, discipline, commitment, humility and hard work. What comes from the heart goes to the heart and that is why our music continues to touch the hearts of many. We believe that change can happen and thus aspire to be the instruments of change in our generation. Behold the past is gone and the new has come - Isaiah 43:19.</p>
                                        <p>Adawnage released its debut album SAFARI – The Journey in December, 2010. The SAFARI album comprises 10 songs and it is a depiction of the journey that the band has taken since we started and the challenges and inspirations we have encountered through our walk.</p>`,
            "gender"            :   "Plural (mixed)",
            "agent"             :   "Grace Nduku - nduku.wambua@adawnage.com | +254 (0) 792 718 750",
            "pi"                :   `<p>The inception of the band was ordained because we came together after having separately and individually tried to make it on our own, each coming too close but not quite. All these changed when we merged and the unit was born. Thus, we have made it our goal to aid upcoming Christian bands in their start-up years to teach them how to do the baby steps rather than giant leaps as the foundation of any team totally depends on how the team's journey begins.</p>`,
            "memberss"          :   [
                                        {  "name"  :   "Iganza Mudacci","role"  :   "Vocalist/Vocal Coach","image"   :   "storage/About/person_1.jpg" },
                                        {
                                            "name"  :   "Roseline Mwihaki","role"  :   "Vocalist/Song Writer","img"   :   "storage/About/person_2.jpg"
                                        },
                                        {
                                            "name"  :   "Robert Njuguna","role"  :   "Vocalist/Song Writer","img"   :   "storage/About/person_3.jpg"
                                        },
                                        {
                                            "name"  :   "Frank Muriuki","role"  :   "Vocalist/Song Writer","img"   :   "storage/About/person_4.jpg"
                                        },
                                        {
                                            "name"  :   "Lorna Olwanda","role"  :   "Vocalist","img"   :   "storage/About/person_1.jpg",
                                        },
                                        {
                                            "name"  :   "Julius Julu","role"  :   "Vocalist/Percussionist","img"   :   "storage/About/person_4.jpg"
                                        },
                                        {
                                            "name"  :   "Grace Nduku","role"  :   "Vocalist","img"   :   "storage/About/person_1.jpg"
                                        },
                                        {
                                            "name"  :   "David Ogara","role"  :   "Keyboardist/Acoustic Guitarist/Vocalist/Song Writer","img"   :   "storage/About/person_3.jpg"
                                        },
                                        {
                                            "name"  :   "Austine Nyambok","role"  :   "Bass Guitarist","img"   :   "storage/About/person_2.jpg"
                                        },
                                        {
                                            "name"  :   "Daniel Ndegwa","role"  :   "Lead Guitarist","img"   :   "storage/About/person_1.jpg"
                                        },
                                        {
                                            "name"  :   "Michael Wanyama","role"  :   "Drummer","img"   :   "storage/About/person_3.jpg"
                                        },
                                        {
                                            "name"  :   "Noah Otiende","role"  :   "Director","img"   :   "storage/About/person_2.jpg"
                                        },
                                        {
                                            "name"  :   "Patrick Muriuki", "role"  :   "Band Manager", "img"   :   "storage/About/person_1.jpg"
                                        },
                                        
                                ],
                    members     :    [],

            }
    },
    methods :{
        getBand(){
            axios.get('/api/admin/members').then((response)=>{
                this.members = response.data.data
                console.log(this.members);
                
            });
        }
    },
    mounted(){
        this.getBand()
    }
}
</script>
<style  scoped>

.sub-title{
    font-size: 28px;
}
.heading h3{ 
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: aliceblue;
}
.about-sub-section{
    padding-left: 1em;
}
.about-sub-section h5{
    font-size:larger
}
.about-sub-section span, .about-info p{
    font-size: medium;
    font-family: 'Sarala', sans-serif;
    font-weight: 300;
    /* font-family: 'Ubuntu', sans-serif; */
}
.about-contents p{
    /* font-family: 'Sarala', sans-serif !important; */
    font-family: 'Ubuntu', sans-serif;
    font-weight: 300;
}

</style>

<style>
.about-sub-section span,.about-info p{
    font-size: medium;
    font-family: 'Sarala', sans-serif;
    /* font-family: 'Ubuntu', sans-serif; */
}
.about-contents p{
    font-family: 'Sarala', sans-serif !important;
    /* font-family: 'Ubuntu', sans-serif; */
}
</style>
