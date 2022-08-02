<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '',
        ]);
        $user->setPasswordAttribute('admin123');
        $user->save();

        // Give admin rle to the user
        $role = Role::where(['name' => 'Admin'])->first();
        $user->assignRole($role);
    }
}
