@extends('layout')

@section('title', 'Резюме')

@section('content')
    <div class="resume wrapper">
        <div class="resume-header" style="min-height: 80vh"> 
            <div class="resume-header-left">
                <img src="{{ asset($resume->photo) }}" alt="" style="width: 227px; height: 227px; object-fit: cover;">
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
        @if($currentuser!=null)
            @if($currentuser->id==$resume->user_id)
                <div class="btns-update-delete">
                    <a href="{{route('resume.edit', $resume->id)}}" class="btn-update font-white-17px hover">Изменить</a>
                    <form method="POST" action="{{route('resume.destroy', $resume->id)}}" style="width: 140px">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete font-white-17px" type="submit">Удалить</button>
                    </form>
                </div>
            @endif
        @endif
    </div>
@endsection
