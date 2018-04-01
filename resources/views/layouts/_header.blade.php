<nav class="navbar navbar-expand-sm navbar-static-top">
    <!-- Branding Image -->
    <a class="navbar-brand" style="margin-left: 10%" href="{{ url('/') }}">
        零售管理系统
    </a>

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav" style="margin-left: 5%">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
        @else
            <li class="nav-item dropdown top-right">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">
                        <Icon type="android-person"></Icon>
                        个人中心
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <Icon type="log-out"></Icon>
                        退出登录
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>
