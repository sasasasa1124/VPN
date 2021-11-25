<?php

use App\Board;
use App\Nationality;
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
        $this->call(UserTableSeeder::class);
        $this->call(BoardSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(AdvertisementSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(NationalitySeeder::class);
    }
}
