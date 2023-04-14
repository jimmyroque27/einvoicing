<?php

namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
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
            'last_name' => 'Garcia', 
            'first_name' => 'James', 
            'name' => 'James Garcia', 
            'email' => 'james.garcia@adi.com.ph',
            'password' => bcrypt('ADI88!analytics!')
        ]);
    
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        $user = User::create([
            'last_name' => 'Dev', 
            'first_name' => 'Jimmy', 
            'name' => 'Jimmy - Dev', 
            'email' => 'jimmy.dev@adi.com.ph',
            'password' => bcrypt('ADI00!analytics!')
        ]);
        $user->assignRole(['1']);
    }
}
