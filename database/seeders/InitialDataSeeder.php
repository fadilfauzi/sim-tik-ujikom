<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Seed Divisions (cek dulu apakah sudah ada)
        if (DB::table('divisions')->count() === 0) {
            DB::table('divisions')->insert([
                ['name' => 'TIK', 'head_name' => 'Kompol TIK'],
                ['name' => 'Satlantas', 'head_name' => 'AKP Lantas'],
                ['name' => 'Reskrim', 'head_name' => 'Iptu Reskrim'],
            ]);
        }

        // 2. Seed Categories (cek dulu apakah sudah ada)
        if (DB::table('categories')->count() === 0) {
            DB::table('categories')->insert([
                ['name' => 'Komputer & Laptop'],
                ['name' => 'Jaringan (Router/Switch)'],
                ['name' => 'Printer & Scanner'],
                ['name' => 'Server'],
            ]);
        }

        // 3. Seed Users (cek dulu apakah sudah ada)
        if (DB::table('users')->count() === 0) {
            // Ambil ID Divisi TIK dan Satlantas
            $tikDivision = DB::table('divisions')->where('name', 'TIK')->first();
            $satlantasDivision = DB::table('divisions')->where('name', 'Satlantas')->first();

            DB::table('users')->insert([
                // ADMIN UTAMA
                [
                    'name' => 'Admin Utama TIK',
                    'email' => 'admin@simtik.com',
                    'password' => Hash::make('password'),
                    'role' => 'admin',
                    'division_id' => $tikDivision->id,
                ],
                // TEKNISI
                [
                    'name' => 'Teknisi Handal',
                    'email' => 'teknisi@simtik.com',
                    'password' => Hash::make('password'),
                    'role' => 'technician',
                    'division_id' => $tikDivision->id,
                ],
                // USER BIASA (PELAPOR)
                [
                    'name' => 'Anggota Satlantas',
                    'email' => 'user@simtik.com',
                    'password' => Hash::make('password'),
                    'role' => 'user',
                    'division_id' => $satlantasDivision->id,
                ],
            ]);
        }
    }
    
}