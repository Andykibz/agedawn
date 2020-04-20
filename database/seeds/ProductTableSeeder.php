<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductTableSeeder extends Seeder
{

    /**
     * List of all products to be seeded
     * @var array
     */
    protected $products = array(
        [
            'name'  => "Adawnage Hoodie - Red", 'slug'=> 'adawnage-hoodie-red','sku_num' => "ADG_HD_RD1", 'image'=>"RedHoodie1.jpg", 'category_id' => 1,
            'description' =>    "<p>Efficiently parallel task focused e-tailers vis-a-vis interdependent ideas. Seamlessly plagiarize resource maximizing technology vis-a-vis tactical schemas. Appropriately build sustainable.</p>",
            'quantity'  => 20, 'price'  => 3500
        ],
        [
            'name'  => "Adawnage Hoodie - Black", 'slug'=> 'adawnage-hoodie-black','sku_num' => "ADG_HD_BK1", 'image'=>"BlackHoodie1.jpg", 'category_id' => 1,
            'description' =>    "<p>Efficiently parallel task focused e-tailers vis-a-vis interdependent ideas. Seamlessly plagiarize resource maximizing technology vis-a-vis tactical schemas. Appropriately build sustainable.</p>",
            'quantity'  => 20, 'price'  => 3500
        ],
        [
            'name'  => "Adawnage Hoodie - Beige", 'slug'=> 'adawnage-hoodie-beige','sku_num' => "ADG_HD_BG1", 'image'=>"BeigeHoodie1.jpg", 'category_id' => 1,
            'description' =>    "<p>Efficiently parallel task focused e-tailers vis-a-vis interdependent ideas. Seamlessly plagiarize resource maximizing technology vis-a-vis tactical schemas. Appropriately build sustainable.</p>",
            'quantity'  => 20, 'price'  => 3500
        ],
        [
            'name'  => "Safari Album", 'slug'=> 'safari-album','sku_num' => "AD_MUS_SAF", 'image'=>"safari.jpg", 'category_id' => 2,
            'description' =>    "<p>The debut album from Adawnage which was released in 2010. It contains songs such as Uwezo, Naomba and safari.</p>",
            'quantity'  => 30, 'price'  => 500
        ],
        [
            'name'  => "Maisha Album", 'slug'=> 'maisha-album','sku_num' => "AD_MUS_MAI", 'image'=>"maisha.jpg", 'category_id' => 2,
            'description' =>    "<p>MAISHA is the second album by Adawnage, released on 1st January 2016, after the success of the first album SAFARI. “Maisha” is a Swahili word meaning “Life” and it was derived from the general message that is being passed across in the lyrics of various songs.
            </p><p>MAISHA is a 13 track album that was written, composed, arranged and played by the members of Adawnage. Some of the genres of the tracks include Pop, Soft Rock, Reggae, Inspirational, Afro beat, Benga, Rumba and some Soul music as well. </p>
            <p>Some of the songs were written dating back as far as 10 years ago and were to be included in the first album but were reserved for the second album, thus giving the raw, innocent feeling in some of the songs.</p><p>
            Get your copy of at LOIS EVENTS MANAGERS - Diamond Shopping Mall (3rd Floor) Suite 3B, Tom Mboya Street, opp. former Odeon Cinema.
            </p>",
            'quantity'  => 30, 'price'  => 500
        ],
    );
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name'  =>  "Hoodies", 'slug' => "hoodies" ]);
        Category::create(['name'  =>  "Music", 'slug' => "music" ]);

        foreach ($this->products as $product) {
            Product::create([
                'name'  => $product['name'], 'slug'  => $product['slug'], 'sku_num'   => $product['sku_num'], 'image'   => $product['image'],
                'category_id'   => $product['category_id'], 'description' => $product['description'], 'quantity'    => $product['quantity'],
                'price' => $product['price']
            ]);
        }
    }
}
