<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'npwp' => 'required',
            'name' => 'required',
            'transaction' => 'required',
            'country' => 'required',
            'harbor' => 'required',
            'hs_code' => 'required',
            'ur_hs_code' => 'required',
            'hd_hs_code' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'tarif' => 'required',
            'ppn' => 'required',
            'total' => 'required',
        ];
    }
}
