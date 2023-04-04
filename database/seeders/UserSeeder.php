<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Foreach_;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'name' => fake()->name(),
        ]);

        for($i =0;$i<100;$i++){
            DB::table('users')->insert([
                'email' => fake()->email(),
                'password' => Hash::make('password'),
                'name' => fake()->name()
            ]);
        }
    }
}
