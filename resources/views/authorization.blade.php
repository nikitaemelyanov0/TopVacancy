@extends('layout')

@section('title', 'Авторизация')

@section('content')
    <div class="registration">
        <div class="registration-inner">
            <div class="registration-header">
                <h1 class="font-white-18px">Авторизация</h1>
            </div>
            <div class="registration-body">
                @if(session()->has('fail'))
                    <p class="font-red-17px" style="margin-top: 20px">Неверно набран email или пароль</p>
                @endif
                <form action="" method="post" class="authorization-form">
                    @csrf
                    <input type="email" placeholder="Email" name="email" class="input-main font-grey-light-16px">
                    <input type="password" placeholder="Пароль" name="password" class="input-main font-grey-light-16px">
                    <button type="submit" class="btn-submit-auth font-white-17px">Отправить</button>
                </form>
                <div class="registration-bottom-text">
                    <span class="font-black-16px">Нет аккаунта?</span>
                    <a href="{{route('registration')}}"><span class="font-blue-16px">Зарегистрироваться</span></a>
                </div>
            </div>
        </div>
    </div>
@endsection