<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PatientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'avatar' => ['required', 'url', 'active_url'],
            'full_name' => ['required', 'string'],
            'mother_full_name' => ['required', 'string'],
            'birthday' => ['required', 'date', 'date_format:Y-m-d'],
            'cpf' => ['required', 'cpf'],
            'cns' => ['required', 'cns'],
        ];
    }

    public function messages()
    {
        return [
            'cpf' => 'The :attribute is invalid.',
            'cns' => 'The :attribute is invalid.'
        ];
    }
}
