<?php

use App\Meta;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     *  ROLES
     */
    protected $members =  array(
        array(
            "name"  =>   "Iganza Mudacci",
            "role"  =>   "Vocalist/Vocal Coach",
            "image"   =>   "person_1.jpg"
        ),
        array(
            "name"  =>   "Roseline Mwihaki",
            "role"  =>   "Vocalist/Song Writer",
            "image" =>   "person_2.jpg"
        ),
        array(
            "name"  =>   "Robert Njuguna",
            "role"  =>   "Vocalist/Song Writer",
            "image"   =>   "person_3.jpg"
        ),
        array(
            "name"  =>   "Frank Muriuki",
            "role"  =>   "Vocalist/Song Writer",
            "image"   =>   "person_4.jpg"
        ),
        array(
            "name"  =>   "Lorna Olwanda",
            "role"  =>   "Vocalist",
            "image"   =>   "person_1.jpg",
        ),
        array(
            "name"  =>   "Julius Julu",
            "role"  =>   "Vocalist/Percussionist",
            "image"   =>   "person_4.jpg"
        ),
        array(
            "name"  =>  "Grace Nduku",
            "role"  =>  "Vocalist",
            "image"   =>  "person_1.jpg"
        ),
        array(
            "name"  =>  "David Ogara",
            "role"  =>  "Keyboardist/Acoustic Guitarist/Vocalist/Song Writer",
            "image"   =>  "person_3.jpg"
        ),
        array(
            "name"  =>  "Austine Nyambok",
            "role"  =>  "Bass Guitarist",
            "image"   =>  "person_2.jpg"
        ),
        array(
            "name"  =>  "Daniel Ndegwa",
            "role"  =>  "Lead Guitarist",
            "image"   =>  "person_1.jpg"
        ),
        array(
            "name"  =>  "Michael Wanyama",
            "role"  =>  "Drummer",
            "image"   =>  "person_3.jpg"
        ),
        array(
            "name"  =>  "Noah Otiende",
            "role"  =>  "Director",
            "image"   =>  "person_2.jpg"
        ),
        array(
            "name"  =>  "Patrick Muriuki",
            "role"  =>  "Band Manager",
            "image"   =>  "person_1.jpg"
        ),        
    );

    

    protected $permissions = [
        'comment','subscribe','backend_access','elevated_backend_access'
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission ]);    
        }

        foreach ($this->members as $member) {
            Meta::create([
                'type'  => 'members', 'name'    =>  $member->name, 
                'slug'   =>  slugify(Meta::class,$member->name),
                'value' =>  json_encode(array(
                                'name'  => $member->name,
                                'role'  => $member->role,
                                'image' => $member->image 
                            ))
            ]);
        }

        factory(App\Article::class, 15)->create();
       
    }
}
