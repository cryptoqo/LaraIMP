<?php

namespace Zabanya\LaraImp;

use Illuminate\Foundation\Http\FormRequest;

class LaraImpRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'f' => ['required', 'regex:/^\w{4}\.js$|^\w{6}\.js$|^\w{7}\.min\.js\.mem$|^\w{8}\.wasm$/'],
        ];
    }

    public function messages()
    {
        return [
            'f.required' => 'A title is required',
            'f.regex'  => 'A message is required',
        ];
    }
}
