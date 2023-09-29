<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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
            'name' => ['required', 'max:50'],
            'itemcode' => ['required', 'max:50'],
            'description' => ['required', 'max:50'],
            'kyat' => ['nullable','min:0'],
            'pae' => ['nullable','min:0'],
            'yway' => ['nullable','min:0'],
            'image' => ['nullable','min:0'],
        ];
    }
}
