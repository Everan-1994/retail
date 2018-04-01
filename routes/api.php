<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function($api) {
    $api->group([
        'middleware' => 'api.throttle', // 调用接口限制
        'limit'      => config('api.rate_limits.sign.limit'), // 次数
        'expires'    => config('api.rate_limits.sign.expires'), // 时间
    ], function ($api) {
        // 图片验证码
        $api->get('captchas/{captcha_key}', 'CaptchasController@store')
            ->name('api.captchas.store');
        // 用户注册
        $api->post('users', 'UsersController@store')
            ->name('api.users.store');
        // 登录
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');

    });

});
