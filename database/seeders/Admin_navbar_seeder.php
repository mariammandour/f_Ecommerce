<?php

namespace Database\Seeders;

use App\Models\Admin_navbar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Admin_navbar_seeder extends Seeder
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
                'name' => 'contact us',
                'route' => 'Admin/links/',
                'ordering' => 3,
            ],
            
        ];
        foreach ($links as $key => $navbar) {
            Admin_navbar::create($navbar);
        }
    }
}
