<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|string|max:20',
            'date' => 'required|date',
            'description' => 'required|string|max:150'
        ];
    }

    /**
     * エラー時に表示する項目名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'date' => '日付',
            'description' => '詳細'
        ];
    }

}
