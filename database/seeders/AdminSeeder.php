<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole('admin');

        $editor=User::firstOrCreate(
            ['email' => 'editor@gmail.com'],
            [
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );
        $editor->assignRole('editor');
        $editor->givePermissionTo(['view page 3']);
        // $editorRole = Role::where('name','editor')->first();
        // $editorRole->syncPermissions('view page 1');
    }
}
