<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {


        return [
            'name' => ['required', 'string', 'max:255' , 'min:3'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'picture' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:8192',
            ],
            'phone' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:4000'],
            'locale' => ['nullable', 'string', 'max:255'],
        ];
    }
}
