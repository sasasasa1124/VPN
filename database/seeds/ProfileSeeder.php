<?php

use Illuminate\Database\Seeder;

use App\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Profile::create(
            [
                'user_id' => 1,
                'gender' => 'other',
                'image_path' => 'https://static.wikia.nocookie.net/garfield/images/9/9f/GarfieldCharacter.jpg/revision/latest/scale-to-width-down/1000?cb=20180421131132',
                'self_introduction' => 'Hi, I am Kota Sasamoto, the founder of this site!'
            ]
            );

    }
}
