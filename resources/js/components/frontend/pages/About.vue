<template>
  <div>
    <Hero :heading="`So what about us ?`" />
    <div class="container about-wrapper mt-5">
      <SubHero :heading="'About Us'" />

      <div class="row mb-3">
        <aside class="col-sm-4 col-12 about-info" >
          <div class="about-sub-section mb-3" data-aos="fade-right">
            <h5 class="text-muted">Founded</h5>
            <span>{{ founded }}</span>
          </div>
          <!-- <hr class="bg-secondary m-1" /> -->
          <div class="about-sub-section  mb-3" data-aos="fade-right">
            <h5 class="text-muted">Band Interests</h5>
            <span>{{ interests }}</span>
          </div>
          <!-- <hr class="bg-secondary m-1" /> -->
          <div class="about-sub-section  mb-3" data-aos="fade-right">
            <h5 class="text-muted">Hometown</h5>
            <span class="pb-3">{{ hometown }}</span>
          </div> 
          <!-- <hr class="bg-secondary m-1" /> -->
          <div class="about-sub-section  mb-3" data-aos="fade-right">
            <h5 class="text-muted">Record Label</h5>
            <span>{{ label }}</span>
          </div>
          <!-- <hr class="bg-secondary m-1" /> -->
          <div class="about-sub-section mb-3" data-aos="fade-right">
            <h5 class="text-muted ">Mission</h5>
            <div class="py-2" v-html="mission"></div>
          </div>
          <Social class="mt-3 adg-shadow" />
        </aside>
        <main class="col-sm-8 col-12 about-contents" data-aos="fade-left">
          <section id="adawnage" class="adg-shadow px-4 pt-2 pb-3">
            <article id="about" class="text-justify" v-html="about.about"></article>
            <article id="bio" class="text-justify">
              <div class="heading">
                <h4 class="text-light">Biography</h4>
              </div>
              <div  v-html="about.bio"></div>
            </article>
          </section>
          
         
        </main>
      </div>
      <section id="discography" class="mb-4">
            <div class="mini_section_title text-center col-12 mb-5" data-aos="slide-down">
              <h3 class>Discography</h3>
            </div>
            <div class="row">
              <div v-for="(discography,index) in discographies" :key="index" class="col-md-4 col-12 mb-3" data-aos="slide-up">
                    <div class="card bg-dark text-white discog" @click="showDiscog( discography.data )">
                        <div class="disco-cover" :style="{'background-image':'url(./storage/About/discography/'+discography.data.image+')'}" data-aos="fade" data-stellar-background-ratio="0.5">
                            
                        </div>
                        <div class="card-img-overlay d-flex flex-column justify-content-end ">
                            <h5 class="card-title pl-3 text-light"> <small><i class="icon-hashtag display-5"></i></small> {{ discography.data.tracks }} </h5>
                            <p class="card-text pl-3"> {{ discography.data.release }} </p>
                        </div>
                        <div>
                          
                        </div>
                    </div>
              </div>
            </div>
          </section>
      <section class="mb-4" id="accolades">
            <div class="mini_section_title text-center col-12 mb-5" data-aos="slide-down">
              <h3 class>Accolades</h3>
            </div>
            <ul class="timeline" data-aos="slide-up">
              <li v-for="(accolade, index) in accolades" :key="index">
                <div v-bind:class="{ 'direction-r' : index%2==1, 'direction-l' : index%2==0 }">
                  <div class="flag-wrapper">
                    <span class="hexa"></span>
                    
                    <span class="flag">{{ accolade.data.name }}</span>
                    <span class="time-wrapper">
                      <font-awesome-icon v-if="accolade.data.scooped" class="text-warning mr-2" icon="award" size="2x"/>
                      <span class="time">{{ accolade.data.year }}</span>
                    </span>
                  </div>
                  <div class="desc">{{ accolade.data.title }}</div>
                </div>
              </li>
            </ul>
          </section>
      
      <section id="members">
            <div class="container members">
                <div class="mini_section_title text-center col-12 mb-5" data-aos="slide-down">
                  <h3 class>Band Artists & officials</h3>
                </div>
                <div class="row" data-aos="slide-up">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12" data-aos="slide-up" v-for="member in members" :key="member.id">
                        <div class="card">
                            <img style="min-height:250px;" class="card-img img-fluid" :alt="member.data.name"
                              :src="`/storage/About/${member.data.image}`"/>
                            <div class="card-img-overlay">
                              <font-awesome-icon v-if="member.data.type == 'official'" class="mr-2 text-dark" icon="id-badge" size="1x"/>
                              <font-awesome-icon v-if="member.data.type == 'members'" class="mr-2 text-dark" icon="music" size="1x"/>
                              <div class="bottom-text">
                                <h5 class="card-title">{{ member.data.name }}</h5>
                                <p class="card-text">
                                  {{ member.data.role }},&nbsp;<small></small>
                                </p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
      <hr />
    </div>
  </div>
</template>
<script>
import Social from "../components/sub/social";
import Hero from "../components/hero";
import SubHero from "../components/subhero";
import Discog from '../components/sub/discog'
export default {
  name: "AboutPage",
  components: { Social, Hero, SubHero, Discog },
  data() {
    return {
      accolades: [],
      about: {},
      discographies: [],
      officials: [],
      members: [],
      founded: "May 28, 2008",
      interests:
        "High School Ministry, Concert Tours, Get-aways, Game Drives, Gigging",
      hometown: "Nairobi, KE",
      label: "Ageless Music",
      mission:
        "<span class='text-light'>Transforming lives through God-inspired music & lifestyle. Our mission is realized through music – positive, electric, realistic and inspirational music. Music is what brought us together. Music was, and still is our common factor</span>",
      
      gender: "Plural (mixed)",
      agent: "Grace Nduku - nduku.wambua@adawnage.com | +254 (0) 792 718 750",
  
    };
  },
  methods: {

    showDiscog( discography ){

          this.$modal.show(
            Discog, 
            {
                discog  : discography
          }, {
            width   :  "480px",
            height  :   'auto',
            delay   :   300,

          })
    },
    getBand() {
      axios.get("/api/metas/getmembers").then(response => {
        this.members = response.data.data;
      });
    },
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
      let response = axios.get("/api/metas/discography").then(response => {
        this.discographies = response.data.data;
      });
    }
  },
  mounted() {
    this.getBand();
    this.getAbout();
    this.getAccolades();
    this.getDiscographies();
  }
};
</script>
<style  scoped>
.card-img-overlay{
  text-shadow: 3px 4px 2px #292727;
}
.discog{
  cursor: pointer;
}

.sub-title {
  font-size: 28px;
}
.heading h4 {
  color: aliceblue;
}
.about-sub-section {
  -webkit-box-shadow: 4px 4px 16px 4px rgba(0,0,0,0.28);
  -moz-box-shadow: 4px 4px 16px 4px rgba(0,0,0,0.28);
  box-shadow: 4px 4px 16px 4px rgba(0,0,0,0.4);
  padding-left: 1em;
}
.about-sub-section h5 {
  padding-top:.4em;
  font-size: medium;

}
.about-sub-section span,
.about-info p {
  font-size: medium;
  font-weight: 300;
}

.disco-cover{
    height: 300px;
    background-size: cover;
    background-position: center;
    
}
#bio p, #about p{
  font-size: 1.2rem;
  line-height: 2;
  color: #fff;
}

</style>

<style lang="scss">
$primaryCol : #00c4f3;
$primaryCol : #f6993f;

.discog-description{
        p{ color: #333 !important; }
        
    }
.about-info p {
  font-size: medium;
}
.about-contents p {
  font-size: 1.2rem;
        line-height: 2;
        color: #fff;
}
.hexa{
  border: 0px;
  float: left;
  text-align: center;
  height: 35px;
  width: 60px;
  font-size: 22px;
  background: #f0f0f0;
  color: #181010;
  position: relative;
  margin-top: 15px;
}

.hexa:before{
  content: ""; 
  position: absolute; 
  left: 0; 
  width: 0; 
  height: 0;
  border-bottom: 15px solid #f0f0f0;
  border-left: 30px solid transparent;
  border-right: 30px solid transparent;
  top: -15px;
}

.hexa:after{
  content: ""; 
  position: absolute; 
  left: 0; 
  width: 0; 
  height: 0;
  border-left: 30px solid transparent;
  border-right: 30px solid transparent;
  border-top: 15px solid #f0f0f0;
  bottom: -15px;
}

.timeline {
  position: relative;
  padding: 0;
  width: 100%;
  margin-top: 1.4em;
  list-style-type: none;
}

.timeline:before {
  position: absolute;
  left: 50%;
  top: 0;
  content: ' ';
  display: block;
  width: 2px;
  height: 100%;
  margin-left: -1px;
  background: rgb(213,213,213);
  background: -moz-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,1)));
  background: -webkit-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: -o-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: -ms-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: linear-gradient(to bottom, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  z-index: 5;
}

.timeline li {
  padding: .4em 0;
}

.timeline .hexa{
  width: 16px;
  height: 10px;
  position: absolute;
  background: $primaryCol;
  z-index: 5;
  left: 0;
  right: 0;
  margin-left:auto;
  margin-right:auto;
  top: -30px;
  margin-top: 0;
}

.timeline .hexa:before {
  border-bottom: 4px solid $primaryCol;
  border-left-width: 8px;
  border-right-width: 8px;
  top: -4px;
}

.timeline .hexa:after {
  border-left-width: 8px;
  border-right-width: 8px;
  border-top: 4px solid $primaryCol;
  bottom: -4px;
}

.direction-l,
.direction-r {
  float: none;
  width: 100%;
  text-align: center;
}

.flag-wrapper {
  text-align: center;
  position: relative;
}

.flag {
  position: relative;
  display: inline;
  // background: rgb(255,255,255);
  font-weight: 400;
  z-index: 15;
  padding: 4px 10px;
  text-align: left;
  border-radius: 5px;
  -webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 4px 5px 2px rgba(0,0,0,0); 
box-shadow: 0px 10px 13px -7px #000000, 5px 4px 5px 2px rgba(0,0,0,0);
}

.direction-l .flag:after,
.direction-r .flag:after {
  content: "";
  position: absolute;
  left: 50%;
  top: -15px;
  height: 0;
  width: 0;
  margin-left: -8px;
  border: solid transparent;
  border-bottom-color: rgb(255,255,255);
  border-width: 8px;
  pointer-events: none;
}

.direction-l .flag {
  -webkit-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  -moz-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
}

.direction-r .flag {
  -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  -moz-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
}

.time-wrapper {
  display: block;
  position: relative;
  margin: 4px 0 0 0;
  z-index: 14;
  line-height: 1em;
  vertical-align: middle;
  color: #fff;
}

.direction-l .time-wrapper {
  float: none;
}

.direction-r .time-wrapper {
  float: none;
}

.time {
  border-bottom: solid 1px $primaryCol;
  display: inline-block;
  padding: 8px;
}

.desc {
  position: relative;
  margin: .5em 0 0 0;
  padding: .4em;
  font-size: large;
  font-weight: 400;
  color: aliceblue;
  background: #191919;
  -webkit-box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000, 5px 4px 5px 2px rgba(0,0,0,0); 
box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000, 5px 4px 5px 2px rgba(0,0,0,0);
  z-index: 15;
}

.direction-l .desc,
.direction-r .desc {
  position: relative;
  margin: .4em .4em 0 .4em;
  padding: .5em 1em;
  z-index: 15;
}

@media(min-width: 768px){
  .timeline {
    width: 660px;
    margin: 0 auto;
    margin-top: 20px;
  }

  .timeline li:after {
    content: "";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
  }
  
  .timeline .hexa {
    left: -28px;
    right: auto;
    top: 8px;
  }

  .timeline .direction-l .hexa {
    left: auto;
    right: -28px;
  }

  .direction-l {
    position: relative;
    width: 310px;
    float: left;
    text-align: right;
  }

  .direction-r {
    position: relative;
    width: 310px;
    float: right;
    text-align: left;
  }

  .flag-wrapper {
    display: inline-block;
  }
  
  .flag {
    font-size: 18px;
  }

  .direction-l .flag:after {
    left: auto;
    right: -16px;
    top: 50%;
    margin-top: -8px;
    border: solid transparent;
    border-left-color: rgb(254,254,254);
    border-width: 8px;
  }

  .direction-r .flag:after {
    top: 50%;
    margin-top: -8px;
    border: solid transparent;
    border-right-color: rgb(254,254,254);
    border-width: 8px;
    left: -8px;
  }

  .time-wrapper {
    display: inline;
    vertical-align: middle;
    margin: 0;
  }

  .direction-l .time-wrapper {
    float: left;
  }

  .direction-r .time-wrapper {
    float: right;
  }

  .time {
    padding: 5px 10px;
  }

  .direction-r .desc {
    margin: .4em 0 0 0.75em;
  }
}

@media(min-width: 992px){
  .timeline {
    width: 800px;
    margin: 0 auto;
    margin-top: 20px;
  }

  .direction-l {
    position: relative;
    width: 380px;
    float: left;
    text-align: right;
  }

  .direction-r {
    position: relative;
    width: 380px;
    float: right;
    text-align: left;
  }
}
@media( max-width: 768px ){
  .timeline:before{
       position: absolute;
  left: 50%;
  top: 0;
  content: ' ';
  display: block;
  width: 2px;
  height: 100%;
  margin-left: -1px;
  background: none;
  
  
  }
}
</style>

