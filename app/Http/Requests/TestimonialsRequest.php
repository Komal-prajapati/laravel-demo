<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'person_name' => 'required',
            'company_nane' => 'nullable',
            'image_file' => 'nullable|file|mimes:JPG,JPEG,PNG,jpg,jpeg,png',
            'content' => 'required',
        ];
    }
}
