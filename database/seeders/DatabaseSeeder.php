<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Sample Inventaris',
            'email' => 'inven@gmail.com',
            'role' => 4,
            'password' => bcrypt('12345678'),
        ]);
        
        User::factory()->create([
            'name' => 'Sample Keuangan',
            'email' => 'keuangan@gmail.com',
            'role' => 3,
            'password' => bcrypt('12345678'),
        ]);

         User::factory()->create([
            'name' => 'Sample Manajer',           
            'email' => 'manajer@gmail.com',
            'role' => 2,
            'password' => bcrypt('12345678'),
        ]);

         User::factory()->create([
            'name' => 'Sample Kasir',            
            'email' => 'kasir@gmail.com',
            'role' => 1,
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Administrator Saku Celana',            
            'email' => 'admin@gmail.com',
            'role' => 0,
            'password' => bcrypt('12345678'),
        ]);
    }
}
