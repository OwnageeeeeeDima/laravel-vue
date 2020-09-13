@extends('layouts.reg')

@section('content')

    <div class="reg">
        <div class="reg__form">
            <div class="reg__form-header">
                Авторизация
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="reg__form-body">
                    @error('email') <span class="message">{{ $message}}</span> @enderror
                    <input type="text" name="email" placeholder="E-mail пользователя">
                    @error('password') <span class="message"> {{ $message}}</span> @enderror
                    <input type="password" name="password" placeholder="Пароль">
                    <p>Еще не зарегистрированы? <a href="{{route('register')}}">Присоединиться к нам</a></p>
                    <button class="btn btn-primary" type="submit">Продолжить</button>

                </div>
            </form>

        </div>
    </div>


@endsection
