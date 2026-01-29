<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        AdminUser::firstOrCreate(
            ['email' => 'admin@slodocs.com'],
            [
                'name' => 'Admin',
                // WARNING: Change password after first login via tinker
                'password' => Hash::make('password'),
            ]
        );
    }
}
