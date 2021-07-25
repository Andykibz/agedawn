<?php

use Illuminate\Database\Seeder;
use App\Meta;

class AboutTableSeeder extends Seeder
{
    /**
     * List of all band members and officials
     * @var array
     */
    protected $members =  array(
        array(
            "name"  =>   "Anthony Iganza",
            "role"  =>   "Vocalist  / Music Director",
            "image"   =>   "Anto.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>   "Natalie Mbula",
            "role"  =>   "Vocalist / Keyboard / Vocalists lead / Media ",
            "image" =>   "Mbula.png",
            "type"  =>      "members"
        ),
        array(
            "name"  =>   "Pastor Robert Njuguna",
            "role"  =>   "Vocalist / Song writer / Public relations lead",
            "image"   =>   "roba.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>   "Julius Julu",
            "role"  =>   "Vocalist  / Percussionist / Merchandise lead",
            "image"   =>   "Juzzy.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>   "Richard",
            "role"  =>   "Keyboard / Instrumentalists lead",
            "image"   =>   "Richie.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>   "Kendi Kaburu",
            "role"  =>   "Vocalist / Songwriter / Media",
            "image"   =>   "woman.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>  "Valerie Njiraini ",
            "role"  =>  "Vocalist  / Songwriter / Community projects",
            "image"   =>  "woman.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"      =>  "Tony Muasya",
            "role"      =>  "Vocalist / Guitar / Songwriter",
            "image"     =>  "Tony.jpg",
            "type"      =>  "members"
        ),
        array(
            "name"  =>  "Frank Muriuki",
            "role"  =>  "Vocalist  / Keyboard / Songwriter",
            "image"   =>  "man.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>  "Diana Omondi",
            "role"  =>  "Vocalist / Guitar / Songwriter",
            "image"   =>  "Diana.png",
            "type"  =>      "members"
        ),
        array(
            "name"  =>  "Bryant",
            "role"  =>  "Drummer",
            "image"   =>  "man.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>  "Musembi",
            "role"  =>  "Lead guitar",
            "image"   =>  "man.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>  "Diana",
            "role"  =>  "Bass guitar",
            "image"   =>  "woman.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>  "Lusanji",
            "role"  =>  "Trumpet",
            "image"   =>  "woman.jpg",
            "type"  =>      "members"
        ),
        array(
            "name"  =>  "Pastor Peter Kimari",
            "role"  =>  "Band Patron",
            "image"   =>  "man.jpg",
            "type"  =>      "official"
        ),
        array(
            "name"  =>  "Nancy Irungu",
            "role"  =>  "Band Manager / Band Logistics ",
            "image"   =>  "Nancy.png",
            "type"  =>      "official"
        ),
        array(
            "name"  =>  "David Ogara",
            "role"  =>  "Finance / Vocalist  / Song writer / Keyboard",
            "image"   =>  "Davi.jpg",
            "type"  =>      "official"
        ),
        array(
            "name"  =>  "Brian Akivembe",
            "role"  =>  "Merchandise",
            "image"   =>  "man.jpg",
            "type"  =>      "official"
        ),
        array(
            "name"  =>  "Samuel Kyalo",
            "role"  =>  "Merchandise",
            "image"   =>  "man.jpg",
            "type"  =>      "official"
        ),
    );

    /**
     * General Profile
     * @var array
     */
    protected $profile = array(
        'founded'       =>  "May 2008",
        'interrests'    =>  "High School Ministry, Concert Tours, Get-aways, Game Drives, Gigging",
        'hometown'      =>  "Nairobi, KE",
        'Label'         =>  "Ageless Music",
        'Mission'       =>  "<p>Transforming lives through God-inspired music & lifestyle.</p><p>Our mission is realized through music – positive, electric, realistic and inspirational music. Music is what brought us together. Music was, and still is our common factor.</p>"
    );

    /**
     * @var string
     */
    protected $about = "<p>Adawnage is a Christian contemporary band; a unit of young and energetic individuals
    from different established professional backgrounds, perhaps with many diverse A interests, but with one sole mission of reaching out of the world through music.</p>
    <p>Adawnage is a fusion of three words A-DAWN-AGE, backed by Isaiah 43:19 which says
    “Behold, I am doing a new thing; now it springs forth, do you not perceive it?
    I will make a way in the wilderness and rivers in the desert”. The Name represents the
    dawning of a new age, a fresh start. Which is what lives are about</p>";

    /**
     * @var string
     */
    protected $bio = "<p>The band’s story is about a small group of three people which has grown in leaps and
    bounds to more than 20 members including Patrons, Advisors and Support Staff.
     Today it is arguably the best gospel band in Kenya. Within the band are concealed
    hurdles and challenges, achievements and inspirations constantly changing the lives of
    Kenyans within and without its borders through song.</p>
    <p>The band has been in existence since May 28th 2008. The band’s inception was
    ordained because we came together having separeted and
    individually tried to make it on our own, each coming close but not quite.
     A family was formed hence a bond was created making us “More than a band”.
    Birthed through prayer, fellowship, dedication, discipline, commitment, humility
    and hard work. Our music comes from the heart and continues to touch many lives.
     We believe in change and aspire to be instruments of change in our generation.</p>";

    /**
     * @var string
     */
    protected $pi = "<p>The inception of the band was ordained because we came together after having separately and individually tried to make it on our own, each coming too close but not quite. All these changed when we merged and the unit was born. Thus, we have made it our goal to aid upcoming Christian bands in their start-up years to teach them how to do the baby steps rather than giant leaps as the foundation of any team totally depends on how the team's journey begins.</p>";

    /**
     * Discography details
     * @var array
     */
    protected $discography = array(
        [
            "title"          =>  "Safari - Debut Album",
            "tracks"        =>  "10",
            "release"       =>  "Dec 2010",
            "description"   =>  "<p>Depiction of the Journey the band has takenIt relates to the audience in the sense of overcoming challenges and being victorious.</p>",
            "type"          =>  "album",
            "image"         =>  "safari_alb.png",
        ],
        [
            "title"          =>  "Maisha",
            "tracks"        =>  "13",
            "release"       =>  "Jan 2016",
            "description"   =>  '<p>The “Maisha” Album is the second album by Adawnage released on 31st December 2015, after the success our first album dubbed ‘Safari”. The word “Maisha” is a Swahili word for “Life” and it was derived from one of the titled songs in the Album as well as from the general message that is being passed across in the lyrics of various songs.
                                </p><p>It is a 13 Track album that was written, composed, arranged and played by the members of Adawnage band and contains different genres of music. Some of the genres include Pop, Soft Rock, Jazz, and Reggae, Inspirational, Afro beat, Benga, Rumba and some Soul music as well. Some of the songs were written dating back as far as 10 years ago and were to be included the first album but were reserved for the second album, thus giving the raw, innocent feeling in some of the songs.
                                </p>',
            "type"          =>  "album",
            "image"         =>  "maisha_alb.jpg",
        ],
        [
            "title"          =>  "Untitled",
            "tracks"        =>  "#",
            "release"       =>  "Expected in 2021",
            "description"   =>  'Coming Soon',
            "type"          =>  "album",
            "image"         =>  "placeholder.png",
        ],
    );

    /**
     * Accolades attained by the band
     * @var array
     */
    protected $accolades = array(
        [
            "name"    =>  "Groove Awards",
            "title"   =>  "Group of the Year",
            "year"   =>  "2011/12/14/15",
            "scooped"   =>  false,
        ],
        [
            "name"    =>  "AGMA",
            "title"   =>  "Group of the Year",
            "year"   =>  "2012",
            "scooped"   =>  false,
        ],
        [
            "name"    =>  "Mwafaka Awards",
            "title"   =>  "Group of the Year",
            "year"   =>  "2011/2012",
            "scooped"   =>  false,
        ],
        [
            "name"    =>  "Kisima Awards",
            "title"   =>  "Gospel Group of the Year,Most Promising Group",
            "year"   =>  "2011",
            "scooped"   =>  false,
        ],
        [
            "name"      =>  "Groove Awards",
            "title"     =>  "Group of the Year",
            "year"     =>  "2012",
            "scooped"   =>  true,
        ],
    );
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->members as $member) {
            Meta::create([
                'type'  => 'members', 'name'    =>  $member['name'],
                'slug'   =>  slugify(Meta::class, $member['name']),
                'value' =>  json_encode(array(
                    'name'  => $member['name'],
                    'role'  => $member['role'],
                    'image' => $member['image'],
                    'type'  => $member['type'],
                ))
            ]);
        }

        /**
         * PERSIST THE ACCOLADES
         */
        foreach ($this->accolades as $accolade) {
            Meta::create([
                'type'  => 'accolades', 'name'    =>  $accolade['name'] . '_' . str_slug($accolade['year']),
                'slug'   =>  slugify(Meta::class, $accolade['name'] . '_' . str_slug($accolade['year'])),
                'value' =>  json_encode(array(
                    'name'      => $accolade['name'],
                    'title'     => $accolade['title'],
                    'year'      => $accolade['year'],
                    'scooped'   => $accolade['scooped'],
                ))
            ]);
        }

        /**
         * PERSIST THE Discography Info
         */
        foreach ($this->discography as $disco) {
            Meta::create([
                'type'  => 'discography', 'name'    =>  $disco['title'],
                'slug'   =>  slugify(Meta::class, $disco['title']),
                'value' =>  json_encode(array(
                    'title'         =>  $disco['title'],
                    'tracks'        =>  $disco['tracks'],
                    'release'       =>  $disco['release'],
                    'description'   =>  $disco['description'],
                    'type'          =>  $disco['type'],
                    'image'         =>  $disco['image']
                ))
            ]);
        }

        Meta::create([
            'name'      => 'about',
            'slug'      => 'about-us',
            'type'      => 'about',
            'value'     =>  json_encode(array(
                'about'     =>  $this->about,
                'bio'       =>  $this->bio,
                'pi'        =>  $this->pi,
            ))

        ]);

        Meta::create([
            'name'  => 'profile',
            'slug'  =>  'profile',
            'type'  =>  'profile',
            'value' =>  json_encode($this->profile)
        ]);
    }
}
