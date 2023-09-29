<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerOrderStoreRequest extends FormRequest
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
            'item_id' => ['required',],
            'customer_id' => ['required'],
            'confirm_status' => ['required',],
            'confirm_price' => ['required','min:0'],
            'org_price' => ['required','min:0'],
            'remark' => ['nullable',],
        ];
    }
}
