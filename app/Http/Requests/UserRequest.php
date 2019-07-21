<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $user = $this->user;

        $param = [
            'name' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user),
            ],
        ];

        if (is_null($user)) {
            $param = array_merge($param, [
                'role' => 'required|integer|min:1|max:15',
                'password' => 'required|confirmed|min:4',
                'password_confirmation' => 'required',
            ]);
        }
        return $param;
    }

    /**
     * エラー時に表示する項目名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'role' => '権限',
            'password' => 'パスワード',
        ];
    }

}
