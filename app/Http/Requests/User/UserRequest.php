<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => [
                'required',
                'max:255',
                'email',
            ],
            'name' => [
                'required',
                'max:255',
            ],
            'password' => [
                Rule::requiredIf($this->isMethod('POST')),
            ],
            'image' => [
                'nullable',
                'file',
                'mimes:jpeg,jpg,png,gif,svg',
                'max:2048',
            ],
            'nid_front' => [
                'nullable',
                'file',
                'mimes:jpeg,jpg,png,gif,svg',
                'max:2048',
            ],
            'nid_back' => [
                'nullable',
                'file',
                'mimes:jpeg,jpg,png,gif,svg',
                'max:2048',
            ],
            'passport' => [
                'nullable',
                'file',
                'mimes:jpeg,jpg,png,gif,svg',
                'max:2048',
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
