<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    use HasFactory;
    protected $fillable=['question','answer'];

    public static function rules()
    {
        return [
            'question'=>'required|min:5',
            'answer'=>'required|min:5'

        ];
    }
    public static function deleterules()
    {
        return [
            'faq_id'=>'required'
        ];
    }
    
}
