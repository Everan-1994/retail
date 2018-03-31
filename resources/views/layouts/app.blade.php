<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Iview -->
    <link href="{{ asset('everans/css/iview.css') }}" rel="stylesheet">
    <!-- Nprogress -->
    <link href="{{ asset('everans/css/nprogress.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
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
