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
           'roles-list',
           'roles-create',
           'roles-edit',
           'roles-delete',
           'routes-list',
           'routes-create',
           'routes-edit',
           'routes-delete',
           'users-list',
           'users-create',
           'users-edit',
           'users-delete',
           'transports-list',
           'transports-create',
           'transports-edit',
           'transports-delete',
           'hotels-list',
           'hotels-create',
           'hotels-edit',
           'hotels-delete',
           'packages-list',
           'packages-create',
           'packages-edit',
           'packages-delete',
           'add-weekends-days',
           'packages-calculation',
           'currencys-conversion',
           'contacts-view',
           'contacts-delete',
           'visa-charges'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}