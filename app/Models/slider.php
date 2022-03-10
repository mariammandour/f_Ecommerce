<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $fillable=['image'];
    public static function rules()
    {
        return [
            'image'=>'required',
        ];

    }
    public static function deleterules()
    {
        return [
            'slider_id'=>'required'
        ];
    }
    public static function updaterules()
    {
        return [
            'slider_id'=>'required',
            'image'=>'nullable',
        ];

    }
}
