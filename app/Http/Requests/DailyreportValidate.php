<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyreportValidate extends FormRequest
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
            'date' => 'required',
            'contents' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を選択してください',
            'contents.required' => '内容を入力してください',
            'contents.string' => '内容は文字を入力してください',
        ];
    }
}
