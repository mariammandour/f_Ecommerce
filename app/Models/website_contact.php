<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class website_contact extends Model
{
    use HasFactory;
    protected $fillable=['Address','phone','email','facebook','twitter','instegram','googlemaps'];
}
