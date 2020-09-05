<?php

use Illuminate\Database\Seeder;
use App\Meta;

class AdawnageSeeder extends Seeder
{
    
    /**
     * @var string
     */
    protected $heroImage = "cover.png";

    /**
     * @var string
     */
    protected $heroText = "Behold, I am doing ... Isaiah 43:19";

    /**
     * @var array
     */
    protected $heroCards = [
        'about'     =>  "Bio, members & officials, Discogaphy and Accolades",
        'shop'      =>  "Checkout our Music and Merch up for sale",
        'news'      =>  "Have a look at what's new with the Adawnage Band"
    ];

    /**
     * List of videos to show on the home page
     * @var array 
     */
    protected $videos = array(
        array(
            'title'         => "Adawnage Live Concert",
            'url'           => "zkUll2qg5_U"
        ),
        array(
            "title"         =>   "Your Name",
            "url"           =>   "Y5rC2yd3aZE",            
        ),
        array(
            "title"         =>   "I Live For You",
            "url"           =>   "RKGo_xNMpwM",
        ),
        array(
            "title"         =>   "Uwezo",
            "url"           =>   "fv75qkXRGBE",
        ),
    );

    /**
     * @var string
     */
    protected $souncloud = "https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/18630862&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true";

    /**
     * @var string
     */
    protected $musictext = "<p>A peek at our content on <a target='+_blank' href='https://soundcloud.com/adawnage'>Soundcloud</a> and <a target='+_blank' href='https://www.youtube.com/channel/UC8w14pp6McD-PcRagO_1r7A'>Youtube</a></p>";

    /**
     * @var string
     */
    protected $newstext = "<p> Latest news, stories, events etc from Adawnage </p>";

    /**
     * @var string
     */
    protected $storetext = "<p> Checkout our Music and Merch up for sale in our Store </p>";

    /**
     * @var array
     */
    protected $social = [
        'facebook'        =>   "https://web.facebook.com/pg/adawnage/",
        'messenger'       =>   "https://m.me/adawnage?fbclid=IwAR3DwLdfP8tGkuqWhv4dhnmeF4-XLxEZKz0ewRHb3nR2Qr0hgLHT2BGOowY",
        'twitter'         =>   "https://twitter.com/adawnage?lang=en  ",
        'email'           =>   "info@adawnage.com",
        'youtube'         =>   "https://www.youtube.com/channel/UC8w14pp6McD-PcRagO_1r7A",
        'soundcloud'      =>   "https://soundcloud.com/adawnage",
        'instagram'       =>   "https://www.instagram.com/adawnage/?hl=en"
    ];
    

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meta::create([
            'type'      =>  'adawnage',     'name'      =>  'heroImage',
            'slug'      =>  'heroimage',    'value'     =>  $this->heroImage
        ]);

        Meta::create([
            'type'      =>  'adawnage',     'name'      =>  'heroText',
            'slug'      =>  'herotext',     'value'     =>  $this->heroText
        ]);

        Meta::create([
            'type'      =>  'adawnageArr',  'name'      =>  'heroCards',
            'slug'      =>  'herocards',    'value'     =>  json_encode($this->heroCards)
        ]);

        Meta::create([
            'type'      =>  'adawnageArr',  'name'      =>  'videos',
            'slug'      =>  'videos',       'value'     =>  json_encode($this->videos)
        ]);

        Meta::create([
            'type'      =>  'adawnage',     'name'      =>  'souncloud',
            'slug'      =>  'souncloud',    'value'     =>  $this->souncloud,
        ]);

        Meta::create([
            'type'      =>  'adawnage',     'name'      =>  'musictext',
            'slug'      =>  'musictext',    'value'     =>  $this->musictext,
        ]);

        Meta::create([
            'type'      =>  'adawnage',     'name'      =>  'newstext',
            'slug'      =>  'newstext',     'value'     =>  $this->newstext,
        ]);

        Meta::create([
            'type'      =>  'adawnage',     'name'      =>  'storetext',
            'slug'      =>  'storetext',    'value'     =>  $this->storetext,
        ]);

        Meta::create([
            'type'      =>  'adawnageArr',  'name'      =>  'social',
            'slug'      =>  'social',       'value'     =>  json_encode($this->social),
        ]);
    }
}
