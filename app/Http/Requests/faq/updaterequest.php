<?php

namespace App\Http\Requests\faq;

use App\Models\faq;
use Illuminate\Foundation\Http\FormRequest;

class updaterequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(faq::rules(),[
            'faq_id'=>'required'
        ]);
    }
}
