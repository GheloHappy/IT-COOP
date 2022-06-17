<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'userID'=>['required'],
            'transaction'=>['required'],
            'savings'=>['required|numeric|min:0|not_in:0'],
            'date'=>['required|date|before:tomorrow']
        ];
    }
}
