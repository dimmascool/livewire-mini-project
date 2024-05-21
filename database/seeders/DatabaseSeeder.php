<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Siswa::create([
            'nama_lengkap' => 'Dimas' . strtoupper(Str::random(10)),
            'kelas' => strtoupper(Str::random(2))
        ]);

        Siswa::create([
            'nama_lengkap' => 'Dimas' . strtoupper(Str::random(10)),
            'kelas' => strtoupper(Str::random(2))
        ]);

        Siswa::create([
            'nama_lengkap' => 'Dimas' . strtoupper(Str::random(10)),
            'kelas' => strtoupper(Str::random(2))
        ]);
    }
}