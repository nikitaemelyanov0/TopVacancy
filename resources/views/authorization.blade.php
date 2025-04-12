@extends('layout')

@section('title', 'Авторизация')

@section('content')
    <div class="registration" style="min-height: 80vh">
        <div class="registration-inner">
            <div class="registration-header">
                <h1 class="font-white-18px">Авторизация</h1>
            </div>
            <div class="registration-body">
                <form action="" method="post" class="authorization-form">
                    @csrf
                    <input type="email" placeholder="Email" name="email" class="input-main font-grey-light-16px" value="{{old('email')}}">
                    <input type="password" placeholder="Пароль" name="password" class="input-main font-grey-light-16px" value="{{old('password')}}">
                    @if(session('error'))
                        <p class="font-red-small">{{session('error')}}</p>
                    @endif
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