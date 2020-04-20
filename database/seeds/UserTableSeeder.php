<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * List of all permissions
     * @var array
     */
    protected $permissions = [
        'comment','subscribe','backend_access','elevated_backend_access'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' =>'password',
            'oauth'     =>  FALSE
        ]);
        $user->givePermissionTo('backend_access','elevated_backend_access');
    }
}
