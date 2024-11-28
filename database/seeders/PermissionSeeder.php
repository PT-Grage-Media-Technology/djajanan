<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::updateOrCreate(
            ['name' => 'admin',],
            ['name' => 'admin',]
        );

        $sellerRole = Role::updateOrCreate(
            ['name' => 'seller',],
            ['name' => 'seller',]
        );

        $buyerRole = Role::updateOrCreate(
            ['name' => 'buyer',],
            ['name' => 'buyer',]
        );

        $permission = Permission::updateOrCreate(
            ['name' => 'categories',],
            ['name' => 'categories']
        );

        $permission2 = Permission::updateOrCreate(
            ['name' => 'userCRUD',],
            ['name' => 'userCRUD']
        );

        $permission3 = Permission::updateOrCreate(
            ['name' => 'productCRUD',],
            ['name' => 'productCRUD']
        );

        $permission4 = Permission::updateOrCreate(
            ['name' => 'product_transactions',],
            ['name' => 'product_transactions']
        );

        // permission admin new
        $permission5 = Permission::updateOrCreate(
            ['name' => 'main-admin',],
            ['name' => 'main-admin']
        );
        $permission6 = Permission::updateOrCreate(
            ['name' => 'dasboard-cms',],
            ['name' => 'dasboard-cms']
        );
        $permission7 = Permission::updateOrCreate(
            ['name' => 'users',],
            ['name' => 'users']
        );
        $permission8 = Permission::updateOrCreate(
            ['name' => 'stores',],
            ['name' => 'stores']
        );
        $permission9 = Permission::updateOrCreate(
            ['name' => 'role-requests',],
            ['name' => 'role-requests']
        );
        $permission10 = Permission::updateOrCreate(
            ['name' => 'histories',],
            ['name' => 'histories']
        );
        $permission11 = Permission::updateOrCreate(
            ['name' => 'backups',],
            ['name' => 'backups']
        );
        $permission12 = Permission::updateOrCreate(
            ['name' => 'faqs',],
            ['name' => 'faqs']
        );
        $permission13 = Permission::updateOrCreate(
            ['name' => 'edit-toko',],
            ['name' => 'edit-toko']
        );
        $permission14 = Permission::updateOrCreate(
            ['name' => 'pengiriman',],
            ['name' => 'pengiriman']
        );

        //new   
        $adminRole->givePermissionTo($permission);
        $adminRole->givePermissionTo($permission2);
        $sellerRole->givePermissionTo($permission3);
        $sellerRole->givePermissionTo($permission4);
        $adminRole->givePermissionTo($permission5);
        $adminRole->givePermissionTo($permission6);
        $adminRole->givePermissionTo($permission7);
        $adminRole->givePermissionTo($permission8);
        $adminRole->givePermissionTo($permission9);
        $adminRole->givePermissionTo($permission10);
        $adminRole->givePermissionTo($permission11);
        $adminRole->givePermissionTo($permission12);
        $adminRole->givePermissionTo($permission14);
        $sellerRole->givePermissionTo($permission13);

   

        //Menmbahkan manual kepada id user role tertentu
        // $user = User::find(38);
        // $user->assignRole($adminRole);
    }
}
