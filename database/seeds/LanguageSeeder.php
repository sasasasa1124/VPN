<?php

use Illuminate\Database\Seeder;

use App\Language;
use App\Profile;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $langs = ['Japanese', 'English', 'Chinese'];

        for ($i=0; $i<count($langs); $i++) {
            Language::create([
                'language' => $langs[$i]
        ]);
            Profile::first()->languages()->attach($i+1);
        }
    }
}
