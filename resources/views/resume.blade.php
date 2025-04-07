@extends('layout')

@section('title', 'Резюме')

@section('content')
   <div class="resume wrapper">
        <div class="resume-header">
            <div class="resume-header-left">
                <img src="{{ asset('storage/'.$resume->photo) }}" alt="">
            </div>
            <div class="resume-header-right">
                <h1 class="font-black-23px">{{$resume->profession}}</h1>
                <h2 class="font-black-21px">{{$user->user_name}}</h2>
                <h3 class="font-black-21px">{{$resume->salary_expectation}}₽</h3>
                <p class="font-black-high-17px">{{$resume->gender}} {{$resume->date_of_birth}}</p>
                <span class="font-black-high-17px">г. {{$resume->city}}</span>
            </div>
        </div>
        <div class="resume-body">
            <p class="font-black-high-17px">Образование: {{$resume->education}}</p>
            <p class="font-black-high-17px">Место учебы: {{$resume->educational_institution}}</p>
            <p class="font-black-high-17px">Номер телефона: {{$resume->phone}}</p>
            <p class="font-black-high-17px">Почта: {{$user->email}}</p>
            <p class="font-black-high-17px">Обо мне: {{$resume->description}}</p>
        </div>
        <div class="btns-update-delete">
            <button class="btn-update font-white-17px">Изменить</button>
            <button class="btn-delete font-white-17px">Удалить</button>
        </div>
   </div>
@endsection