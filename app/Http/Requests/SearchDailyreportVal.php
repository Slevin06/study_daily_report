<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchDailyreportVal extends FormRequest
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
            'id' => 'numeric|nullable'
        ];
    }

    public function messages()
    {
        return [
            'id.numeric' => '数字で入力してください',
        ];
    }
}
