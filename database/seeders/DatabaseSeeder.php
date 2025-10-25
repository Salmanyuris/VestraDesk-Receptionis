<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin Resepsionis',
            'email' => 'admin@company.com',
            'password' => bcrypt('password'),
        ]);

        // Create sample employees
        Employee::create([
            'name' => 'Ahmad Wijaya',
            'department' => 'IT',
            'position' => 'Software Developer',
            'email' => 'ahmad@company.com',
            'phone' => '081234567890',
            'status' => true,
        ]);

        Employee::create([
            'name' => 'Sari Dewi',
            'department' => 'HR',
            'position' => 'HR Manager',
            'email' => 'sari@company.com',
            'phone' => '081234567891',
            'status' => true,
        ]);

        Employee::create([
            'name' => 'Budi Santoso',
            'department' => 'Marketing',
            'position' => 'Marketing Manager',
            'email' => 'budi@company.com',
            'phone' => '081234567892',
            'status' => true,
        ]);
    }
}