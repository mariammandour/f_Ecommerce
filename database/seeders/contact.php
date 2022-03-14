<?php

namespace Database\Seeders;

use App\Models\website_contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class contact extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'Address' => 'Khaja Road, Bayzid, Chittagong, Bangladesh',
                'Phone' => '+880-31-000-000',
                'email' => 'hello@example.com',
                'facebook'=>'https://www.facebook.com/themefisher',
                'twitter'=>'https://twitter.com/themefisher',
                'instegram'=>'https://www.instagram.com/?hl=en',
                'googlemaps'=>'https://www.google.com/maps/d/embed?mid=17ypu6lK4l8NDAz2aRpyzK68cseM&ehbc=2E312F'
            ],
            
            
        ];
        foreach ($links as $key => $contact) {
            website_contact::create($contact);
        }
    }
}
