<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ['Owner', 'Kasir'];

        foreach ($role as $index => $data) {
            DB::table('role')->insert([
                'id_role' => $index + 1,
                'nama_role' => $data,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
