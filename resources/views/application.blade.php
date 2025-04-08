{{-- @extends('layout')

@section('title', 'Отклики')

@section('content')
   <div class="application wrapper">
        <div class="card-vacancy">
            <h4 class="font-black-23px">Продавец-кассир</h4>
            <div class="card-vacancy-tags">
                <h5 class="font-black-18px">от 48 000 ₽ за месяц</h5>
                <ul class="font-black-16px">
                    <li>без опыта</li>
                </ul>
            </div>
            <ul class="card-vacancy-list font-black-16px">
                <li>Пятерочка</li>
                <li class="card-vacancy-list-locate"><img src="{{asset('assets/images/location-blue.png')}}" alt=""> Челябинск</li>
            </ul>
        </div>
        <div class="application-body">
            <h1 class="font-black-20px">Отклики</h1>
            <div class="resume-header">
                <div class="resume-header-left">
    
                </div>
                <div class="resume-header-right">
                    <h1 class="font-black-20px">Системный администратор</h1>
                    <h2 class="font-black-19px">Иванов Иван</h2>
                    <h3 class="font-black-19px">90 000 ₽</h3>
                    <p class="font-black-high-17px">Мужчина 29 лет</p>
                    <span class="font-black-high-17px">Челябинск</span>
                </div>
            </div>
            <div class="resume-header">
                <div class="resume-header-left">
    
                </div>
                <div class="resume-header-right">
                    <h1 class="font-black-20px">Системный администратор</h1>
                    <h2 class="font-black-19px">Иванов Иван</h2>
                    <h3 class="font-black-19px">90 000 ₽</h3>
                    <p class="font-black-high-17px">Мужчина 29 лет</p>
                    <span class="font-black-high-17px">Челябинск</span>
                </div>
            </div>
        </div>
   </div>
@endsection
 --}}
@foreach($currentuser->vacancies as $vacancy)
    {{$vacancy->position}}
@endforeach