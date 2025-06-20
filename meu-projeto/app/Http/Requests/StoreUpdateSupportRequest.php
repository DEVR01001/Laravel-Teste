<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupportRequest extends FormRequest
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


       $rules =  [
            'subject' => "required|min:3|max:255",
            'body' =>[
                'required',
                'min:3',
                'max:1000',
            ],
        ];


        if($this->method() === 'PUT' || $this->method() === 'PATCH'){

            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',

                Rule::unique('suporte')->ignore($this->suporte ?? $this->id),
            ];

        }

        return $rules;
    }
}
