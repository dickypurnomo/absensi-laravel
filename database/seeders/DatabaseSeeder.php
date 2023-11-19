<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Division;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'divisions_id' => mt_rand(1, 3),
            'address' => fake()->address(),
            'phonenumber' => fake()->phoneNumber(),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' => '1'
        ]);

        User::factory(5)->create();

        Absensi::factory(10)->create();

        Division::create([
            'name' => 'Head Officer'
        ]);
        Division::create([
            'name' => 'Financial Director'
        ]);
        Division::create([
            'name' => 'Marketing Director'
        ]);
    }
}
