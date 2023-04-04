<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('employees')->truncate();
        DB::table('companies')->truncate();
        $this->call(UserSeeder::class);
        Company::factory(100)->create();
        Employee::factory(100)->create();

    }
}
