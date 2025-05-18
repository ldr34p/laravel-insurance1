<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reg_number' => [
                'required',
                'string',
                'max:6',
                'regex:/^([ABCDEFGHIYJKLMNOPRSTUVZ]{3}[0-9]{3}|T[0-9]{4}|EX[0-9]{4}|H[0-9]{5}|P[0-9]{5}|[0-9]{4}[A-Z]{2})$/',
                'unique:cars,reg_number',
            ],
            'brand' => 'required|string|max:30',
            'model' => 'required|string|max:128',
            'owner_id' => 'required|integer'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'reg_number' => strtoupper($this->reg_number),
        ]);
    }

    public function messages(): array
    {
        return [
            'reg_number.string' => __('The registration number must be a string.'),
            'reg_number.max' => __('The registration number must not be greater than 6 characters.'),
            'reg_number.regex' => __('The registration number must be in the correct format (XXX000, T0000, EX0000, H00000, P00000 or 0000XX).'),
            'brand.string' => __('The brand must be a string.'),
            'brand.max' => __('The brand must not be greater than 30 characters.'),
            'model.string' => __('The model must be a string.'),
            'model.max' => __('The model must not be greater than 128 characters.'),
            'reg_number.unique' => __('The registration number has already been taken.'),
        ];
    }
}
