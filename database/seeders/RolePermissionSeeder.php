<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $adminRole = Role::create([
        //     'name' => 'admin',
        // ]);

        // $sellerRole = Role::create([
        //     'name' => 'seller',
        // ]);

        // $buyerRole = Role::create([
        //     'name' => 'buyer',
        // ]);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123admin'),
            'google_id' => 'google_id',
            'google_token' => 'google_token',
            'google_refresh_token' => 'google_refresh_token',
        ]);

    


        //LETSSSS GOOOOOOOOOO

        Role::updateOrCreate(
            ['name' => 'admin',],
            ['name' => 'admin',]
        );

        Role::updateOrCreate(
            ['name' => 'seller',],
            ['name' => 'seller',]
        );
        
        Role::updateOrCreate(
            ['name' => 'buyer',],
            ['name' => 'buyer',]
        );
        
    }
}
