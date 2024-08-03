<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Mengatur locale untuk Indonesia
        $roleId = DB::table('role')->pluck('id_role')->toArray();
        $cabangId = DB::table('cabang')->pluck('id_cabang')->toArray();

        // Pilih ID role untuk owner
        $ownerRoleId = 1;

        // Pilih ID role untuk user lainnya
        $otherRoleIds = array_diff($roleId, [$ownerRoleId]);

        // Inisialisasi variabel untuk memilih indeks owner
        $ownerIndex = rand(1, 10);

        foreach (range(1, 10) as $index) {
            $isOwner = $index === $ownerIndex; // Menentukan jika ini adalah data owner

            DB::table('user')->insert([
                'id_user' => $index,
                'id_role' => $isOwner ? $ownerRoleId : $faker->randomElement($otherRoleIds),
                'id_cabang' => $faker->randomElement($cabangId),
                'nama' => $faker->name(),
                'username' => $isOwner ? 'owner' : $faker->userName(),
                'password' => Hash::make('password'),
                'no_hp' => '08' . $faker->numberBetween(1000000000, 9999999999), // Nomor telepon dengan format 08xxxxxxxxxx
                'alamat' => $faker->address(),
                'foto' => "profil.png",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
