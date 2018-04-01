<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AuthorizationsRequest;

class AuthorizationsController extends Controller
{
    public function store(AuthorizationsRequest $request)
    {
        $verifyData = \Cache::get($request->captcha_key);

        if (!$verifyData) {
            return $this->response->error('验证码已失效', 422);
        }
        if (!hash_equals($verifyData['code'], $request->captcha)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password
        ];
        if (!$token = \Auth::attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }
        return $this->response->created();
    }
}
