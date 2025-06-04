<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=Role::create(['name'=>'admin']);
        $editor=Role::create(['name'=>'editor']);
        $viewer=Role::create(['name'=>'viewer']);

        $permissions = [
            'view dashboard',
            'view page 1',
            'view page 2',
            'view page 3',
        ];
        foreach($permissions as $permission){
            Permission::firstOrCreate(['name'=>$permission]);
        }

        // $admin->givePermissionTo(Permission::all());
        $admin->givePermissionTo([
            'view dashboard',
            'view page 1',
            'view page 2',
            'view page 3',
        ]);

        $editor->givePermissionTo([
            'view dashboard',
            'view page 1',
        ]);

        $viewer->givePermissionTo([
            'view dashboard',
            'view page 1',
        ]);
        
    }
}
