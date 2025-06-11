<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(KelasSeeder::class);
        $this->call(TugasSeeder::class);
        $this->call(PengumumanSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(TugasMahasiswaSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'status' => 'admin'
        ]);
    }
}
