<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Karyawan;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Hardik Savani', 
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('admin@gmail.com'),
            'avatar'=>'images/icon/avatar.jpg',
        ]);
  
        $role = Role::create(['name' => 'Admin']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);


        $user2 = User::create([
        	'name' => 'Cs1', 
        	'email' => 'cs1@gmail.com',
        	'password' => bcrypt('cs1@gmail.com'),
            'avatar'=>'images/icon/avatar.jpg',
        ]);
  
        $role2 = Role::create(['name' => 'Customer Service']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role2->syncPermissions($permissions);
   
        $user2->assignRole([$role2->id]);

        // $response = Karyawan::create([
        //     'id_user' => $user->id
        // ]);
    }
}
