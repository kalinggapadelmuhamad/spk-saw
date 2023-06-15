<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::table('users')->insert([
            [
                'uuid'      => Str::uuid(),
                'nrp'       => 12345,
                'password'  => Hash::make('admin'),
                'nama'      => 'admin',
                'email'     => 'admin@gmail.com',
                'role'      => 'admin',
                'status'    => true
            ],
            // [
            //     'uuid'      => Str::uuid(),
            //     'username'  => 'user',
            //     'password'  => Hash::make('user'),
            //     'nama'      => 'user',
            //     'email'     => 'user@gmail.com',
            //     'role'      => 'user'
            // ],
        ]);

        DB::table('kriterias')->insert([
            [
                'uuid'          => Str::uuid(),
                'kode_kriteria' => 'C1',
                'nama'          => 'Kreativitas',
                'type'          => 'Benefit',
                'bobot'         => 20
            ],
            [
                'uuid'          => Str::uuid(),
                'kode_kriteria' => 'C2',
                'nama'          => 'Menghidupkan suasana',
                'type'          => 'Benefit',
                'bobot'         => 10
            ],
            // [
            //     'uuid'          => Str::uuid(),
            //     'kode_kriteria' => 'C3',
            //     'nama'          => 'Metode yang digunakan',
            //     'type'          => 'Benefit',
            //     'bobot'         => 10
            // ],
            // [
            //     'uuid'          => Str::uuid(),
            //     'kode_kriteria' => 'C4',
            //     'nama'          => 'Penguasaan materi',
            //     'type'          => 'Benefit',
            //     'bobot'         => 15
            // ],
            // [
            //     'uuid'          => Str::uuid(),
            //     'kode_kriteria' => 'C5',
            //     'nama'          => 'Manajemen waktu',
            //     'type'          => 'Benefit',
            //     'bobot'         => 15
            // ],
            // [
            //     'uuid'          => Str::uuid(),
            //     'kode_kriteria' => 'C6',
            //     'nama'          => 'Kemampuan menjelaskan',
            //     'type'          => 'Benefit',
            //     'bobot'         => 10
            // ],
            // [
            //     'uuid'          => Str::uuid(),
            //     'kode_kriteria' => 'C7',
            //     'nama'          => 'Jam mengajar',
            //     'type'          => 'Benefit',
            //     'bobot'         => 20
            // ],
        ]);
    }
}
