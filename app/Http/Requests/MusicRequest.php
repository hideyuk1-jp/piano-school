<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicRequest extends FormRequest
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
            'composer' => 'required|string|max:20',
            'limit' => 'required|integer',
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
            'title' => '曲名',
            'composer' => '作曲者',
            'limit' => '上限'
        ];
    }

}
