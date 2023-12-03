<?php

namespace Database\Seeders;

use App\Models\Nationality;
use App\Models\Relegion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(bloodTableSeeder::class);
        $this->call(NationalityTableSeeder::class);
        $this->call(RelegionTableSeeder::class);

    }
}
