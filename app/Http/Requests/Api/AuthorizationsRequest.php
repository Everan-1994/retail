<?php

namespace App\Http\Requests\Api;

class AuthorizationsRequest extends Request
{
    public function rules()
    {
        return [
            'email'    => 'required|email',
            'password' => 'required|string|between:6,18',
            'captcha'  => 'required|string'
        ];
    }

    public function message()
    {
        return [
            'email.required'    => '邮箱不能为空',
            'email.email'       => '邮箱格式不正确',
            'password.required' => '密码不能为空',
            'password.between'  => '密码介于6 ~ 18位之间',
            'captcha.required'  => '验证码不能为空'
        ];
    }
}
