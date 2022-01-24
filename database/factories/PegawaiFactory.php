<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_pegawai' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'nomor_hp' =>$this->faker->phoneNumber,
            'nip' => null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password 
            'alamat' => $this->faker->address(),
            'remember_token' => Str::random(10),
        ];
    }
}
