<?php

namespace App\Http\Requests\slider;

use App\Models\slider;
use Illuminate\Foundation\Http\FormRequest;

class updateslider extends FormRequest
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
        return slider::updaterules();
    }
}
