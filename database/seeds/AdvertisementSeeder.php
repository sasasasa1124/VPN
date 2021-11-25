<?php

use App\Advertisement;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Advertisement::create([
            'user_id' => 1,
            'communicationLanguage' => 'Chinese',
            'title' => 'Wanted: Native Chinese students or international students who are fluent in English (so basically everyone in the program?), Me: Native Japanese with middle communication skills in Both English and Chinese',
            'body' => 'I need someone who communicates with me in Chinese or English in PHBS so much that actually created website...',
        ]);
    }
}
