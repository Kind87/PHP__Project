<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Message = new Message;
        $Message->name = "test";
        $Message->content = "hello world2";
        $Message->created_at = date("Y-m-d h:i:s");
        $Message->save();
    }
}
