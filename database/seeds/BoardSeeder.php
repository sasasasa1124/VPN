<?php

use Illuminate\Database\Seeder;

use App\Board;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i <= 10; $i++) {
            Board::create([
                'topic' => 'test'. $i,
                'user_id' => 1,
                'status' => 'public',
            ]);
        }
    }
}
