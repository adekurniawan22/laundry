<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CabangSeeder::class,
            UserSeeder::class,
            CabangKontakSeeder::class,
            KategoriSeeder::class,
            PelangganSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
