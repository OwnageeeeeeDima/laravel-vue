@extends('layouts.reg')

@section('content')

    <div class="reg">
        <div class="reg__form">
            <div class="reg__form-header">
                Регистрация
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="reg__form-body">
                    @error('name') <span class="message">{{ $message }}</span> @enderror
                    <input type="text" name="name" placeholder="Имя пользователя">
                    @error('email') <span class="message">{{ $message}}</span> @enderror
                    <input type="text" name="email" placeholder="E-mail пользователя">
                    @error('password') <span class="message"> {{ $message}}</span> @enderror
                    <input type="password" name="password" placeholder="Пароль (от 6 знаков)">
                    <input type="password" name="password_confirmation" placeholder="Повторите пароль">
                    <p>Уже зарегистрированы? <a href="{{route('login')}}">Войти в систему</a></p>
                    <button class="btn btn-primary" type="submit">Продолжить</button>

                </div>
            </form>

        </div>
    </div>


@endsection
