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
                <button class="btn-work font-black-16px role-choose">Я ищу работу</button>
                <button class="btn-employee font-black-16px">Я ищу сотрудников</button>
            </div>
            <form action="" method="post" class="registration-form">
                @csrf
                <input type="text" value="applicant" class="role" name="role" style="display: none">
                <input type="email" placeholder="Email" name="email" class="input-main font-grey-light-16px">
                <input type="text" placeholder="Ваше имя и фамилия" name="user_name" class="input-main font-grey-light-16px">
                <input type="password" placeholder="Пароль" name="password" class="input-main font-grey-light-16px">
                <input type="password" placeholder="Пароль еще раз" name="password-repeat" class="input-main font-grey-light-16px">
                <button type="submit" class="btn-submit-reg font-white-17px">Отправить</button>
            </form>
            <div class="registration-bottom-text">
                <span class="font-black-16px">Уже есть аккаунт?</span>
                <a href="{{route('login')}}"><span class="font-blue-16px">Войти</span></a>
            </div>
        </div>
    </div>
</div>
@endsection


