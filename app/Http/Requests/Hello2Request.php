<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Hello2Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Validation rules
        ];
    }
}