<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/lk.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

{{--  Preloader fore page load   <balance></balance>--}}
    <header class="header">
        <div class="wrapper">
            <div class="header__inner">

                <!-- burger left menu start -->
                <div class="burger">
                    <i class="fa fa-bars" id="burger" aria-hidden="true"></i>
                </div>

                <!-- burger left menu end -->
                <div class="cash">
                    {{ \Illuminate\Support\Facades\Auth::user()->balance ? \Illuminate\Support\Facades\Auth::user()->balance : '0,00'}}
                    <i class="fas fa-ruble-sign"></i>
                </div>
                <div class="profile" id="profile">
                    Dima Ganin <i class="fas fa-angle-down" id="arrow"></i>
                    <div class="dropdown__menu">
                        <div class="dropdown__menu-header">
                            <div class="suite-desc">
                                Номер кабинета
                            </div>
                            <div class="suite">
                                #29394
                            </div>
                        </div>
                        <div class="dropdown__menu-body">
                            <ul>
                               <li> <router-link tag="a" to="/lk/profile/"><i class="far fa-user"></i>Профиль</router-link> </li>
                               <li> <router-link tag="a" to="/li/profile/"><i class="fas fa-cog"></i> Настройки</router-link> </li>
                               <li> <router-link tag="a" to="/li/profile/"> <i class="fas fa-users"></i> Получатели</router-link> </li>
                               <li> <router-link tag="a" to="/li/profile/"><i class="fas fa-map-marker-alt"></i>Адреса доставки</router-link> </li>
                            </ul>

                        </div>
                        <div class="dropdown__menu-footer">
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i
                                    class="fas fa-sign-out-alt"></i> Выход</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="left__sidebar" id="sidebar">
        <div class="left__sidebar-logo">
            Shopfans
        </div>
        <div class="left__sidebar-nav">
            {{--                        <a href="#">link 1</a>--}}
            {{--                        <a href="#">link 2</a>--}}
            <router-link to="/lk/inbox">Покупки</router-link>
            <router-link to="/lk/parcels">Посылки</router-link>
            <router-link to="/lk/costs">Стоимость доставки</router-link>
            <router-link to="/lk/faq">Помощь</router-link>

        </div>


    </div>

    <div class="main-content">
        <script type="application/javascript">
            window.Laravel = <?php echo json_encode(['api_token' => (Auth::user())->api_token]); ?>
        </script>
        @yield('content')
        <router-view></router-view>
    </div>


</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
