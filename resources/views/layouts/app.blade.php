<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Retail') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Iview -->
    <link href="{{ asset('everans/css/iview.css') }}" rel="stylesheet">
    <!-- Nprogress -->
    <link href="{{ asset('everans/css/nprogress.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('layouts._header')

        <div class="container">
            @yield('content')
        </div>

        @include('layouts._footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Vue -->
    <script src="{{ asset('everans/js/vue.min.js') }}"></script>
    <!-- Vue -->
    <script src="{{ asset('everans/js/axios.min.js') }}"></script>
    <!-- Iview -->
    <script src="{{ asset('everans/js/iview.min.js') }}"></script>
    <!-- Nprogress -->
    <script src="{{ asset('everans/js/nprogress.js') }}"></script>

    <script>
        // 禁用进度环
        NProgress.configure({showSpinner: false});
        // 开启过渡滚动条
        NProgress.start();

        window.onload = () => {
            // 关闭过渡滚动条
            NProgress.done();
        }

//        // 请求拦截器
//        axios.interceptors.request.use(function (config) {
//            // config.headers['Authorization'] = 'Bearer ';
//            NProgress.start();
//            return config;
//        }, function (error) {
//            return Promise.reject(error);
//        });
//
//        // 添加一个返回拦截器
//        axios.interceptors.response.use((response) => {
//            // 请求结束，蓝色过渡滚动条消失
//            NProgress.done();
//            return response;
//        }, (error) => {
//            // 请求结束，蓝色过渡滚动条消失
//            NProgress.done();
//            return Promise.reject(error);
//        });
    </script>

    <scripts>
        @yield('scripts')
    </scripts>

</body>
</html>
