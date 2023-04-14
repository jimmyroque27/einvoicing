<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'permission-show',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-show',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-show',
            'taxpayer-list',
            'taxpayer-create',
            'taxpayer-edit',
            'taxpayer-delete',
            'taxpayer-show',
            'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',
            'contact-show',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-show',
            'invoice-list',
            'invoice-create',
            'invoice-edit',
            'invoice-delete',
            'invoice-show',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'category-show',
            'currency-list',
            'currency-create',
            'currency-edit',
            'currency-delete',
            'currency-show',
            'atc-list',
            'atc-create',
            'atc-edit',
            'atc-delete',
            'atc-show',
            
            
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
