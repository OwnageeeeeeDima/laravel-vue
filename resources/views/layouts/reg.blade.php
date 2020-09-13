<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>

{{--<header class="header">--}}
{{--    <div class="wrapper">--}}
{{--        <div class="header__inner">--}}
{{--            <div class="header__menu">--}}
{{--                <div class="header__logo">--}}
{{--                    <h1>Logo</h1>--}}
{{--                </div>--}}
{{--                <ul class="header__list">--}}
{{--                    <li class="header__item"><a href="#" class="header__link">Стоимость услуг</a></li>--}}
{{--                    <li class="header__item"><a href="#" class="header__link">Вопросы</a></li>--}}
{{--                    <li class="header__item"><a href="#" class="header__link">Новости</a></li>--}}
{{--                    <li class="header__item"><a href="#" class="header__link">Контакты</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="sign">--}}
{{--                <a href="#" class="sign__link">Войти</a>--}}
{{--                <a href="#" class="sign__link">Регистрация</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}


<div class="app">
    @yield('content')

</div>


</body>
