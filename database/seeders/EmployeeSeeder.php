<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Employee::create([
            'first_name' => 'Ahmad',
            'last_name' => 'Tarabsheh',
            'company_id' => 1, // Company ID from CompanySeeder
            'email' => 'ahmad@example.com',
            'phone' => '987-654-3210',
        ]);
    }
}
