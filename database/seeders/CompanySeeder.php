<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          // Insert sample companies
          Company::create([
            'name' => 'Sample Company 1',
            'email' => 'company1@example.com',
            'logo' => 'logo.png',
            'website' => 'http://www.company1.com',
        ]);

    }
}
