<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Bikin 10 user random (opsional, kalau gak butuh lu hapus aja)
        User::factory(5)->create();

        // Bikin 1 Test User 
        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser123',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            // WAJIB ISI INI:
            'gender' => 'Laki-laki',
            'birth_date' => '2000-01-01',
        ]);

        // Manggil Seeder Edukasi
        $this->call([
            EducationSeeder::class,
        ]);
    }
}
