@extends('layout')

@section('title', 'Регистрация')

@section('content')
<div class="registration">
    <div class="registration-inner">
        <div class="registration-header">
            <h1 class="font-white-18px">Регистрация</h1>
        </div>
        <div class="registration-body">
            <h2 class="font-black-18px">Что вы ищите?</h2>
            <div class="btns-work-employee">
                <button class="btn-work font-black-16px">Я ищу работу</button>
                <button class="btn-employee font-black-16px">Я ищу сотрудников</button>
            </div>
            <form action="#" method="post" class="registration-form">
                <input type="email" placeholder="Email" name="Email" class="input-main font-grey-light-16px">
                <input type="text" placeholder="Ваше имя и фамилия" name="name" class="input-main font-grey-light-16px">
                <input type="password" placeholder="Пароль" name="password" class="input-main font-grey-light-16px">
                <input type="password" placeholder="Пароль еще раз" name="password-repeat" class="input-main font-grey-light-16px">
                <button type="submit" class="btn-submit-reg font-white-17px">Отправить</button>
            </form>
            <div class="registration-bottom-text">
                <span class="font-black-16px">Уже есть аккаунт?</span>
                <a href="{{route('authorization')}}"><span class="font-blue-16px">Войти</span></a>
            </div>
        </div>
    </div>
</div>
@endsection


