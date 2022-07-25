<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'home',
           'role',
           'users',
           'client',
           'invoice',
           'invoice-detail',
           'tarif-rajao',
           'pengiriman-rajao-list',
           'pengiriman-rajao-create',
           'pengiriman-rajao-edit',
           'pengiriman-rajao-delete',
           'gajikaryawan',
           'debitkredit',
           'datapengiriman-list',
           'datapengiriman-create',
           'datapengiriman-edit',
           'datapengiriman-delete',
           'manifest',
           'manifest-detail',
           'bonus',
           'galery',
           'tarif',
           'origin',
           'courier',
           'typepaket',
           'tarifin',
           'pengiriman-trakingmore-list',
           'pengiriman-trakingmore-create',
           'pengiriman-trakingmore-edit',
           'pengiriman-trakingmore-delete',
           'country',
        ];
 
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
