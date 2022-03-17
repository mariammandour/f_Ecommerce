<?php

namespace Database\Seeders;

use App\Models\message;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class message_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'name' => 'Mariam',
                'email' => 'mariam@marim.com',
                'subject' => 'sales',
                'message'=> 'when price will de in sale?'
            ],
            
        ];
        foreach ($messages as $key => $message) {
            message::create($message);
        }
    }
}
