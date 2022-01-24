<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str;
use DB;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('petugas')->insert([
            'nama_petugas' => 'Allpha',
            'username' => 'Allpha',
            'nomor_hp' => '082329547489',
            'level' => 'admin',
            'password' => bcrypt('AllphaChan06'),
            'remember_token' => Str::random(10),
        ]);
        \App\Models\Petugas::factory(10)->create();
    }
}
