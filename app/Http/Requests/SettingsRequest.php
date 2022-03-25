<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'nullable',
            'confirm_password' => 'nullable|same:password',
            'email' => 'required|email:filter|unique:users,email,' . auth()->id(),
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'city' => 'required',
            'pin_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'contact_number' => 'required|numeric',
        ];
    }
}
