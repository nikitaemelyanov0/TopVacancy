@extends('layout')

@section('title', 'TopVacancy')

@section('content')
    <section class="main">
        <div class="main-background">
            <div class="main-inner wrapper">
                <div class="main-inner">
                    <h1 class="font-white-37px">Найдите работу для себя</h1>
                    <div class="main-searh">
                        <img src="{{asset('assets/images/glass.png')}}" alt="" class="glass">
                        <form action="{{route('search_vacancy')}}" method="GET" class="home-search">
                            <input type="text" placeholder="Найти вакансию" class="search-field font-grey-16px" name="position">
                            <button type="submit" class="btn-search font-white-16px">Найти</button>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="new-vacancies wrapper">
        <h1 class="font-black-20px title">Новые вакансии</h1>
        <div class="cards">
            @foreach($vacancies as $vacancy)
                <a href="{{route('vacancy.index', $vacancy->id)}}">
                    <div class="card hover">
                        <h2 class="font-black-18px">{{$vacancy->position}}</h2>
                        <p class="font-black-17px">{{$vacancy->salary}}₽ в месяц</p>
                        <hr>    
                        <p class="font-black-15px">{{$vacancy->company_name.', '.$vacancy->address}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <section class="companies wrapper">
        <h1 class="font-black-20px title-second">Компании</h1>
        <div class="cards-companies">
            @foreach($companies->take(6) as $company)
                <a href="{{route('search_company', $company->company_name)}}"><div class="card-company hover">
                    <img src="{{asset('storage/'.$company->logo)}}" alt="" style="height: 63px">
                    <h3 class="font-light-16px">{{$company->company_name}}</h3>
                </div></a>
            @endforeach
        </div>
    </section>
    <section class="work-by-profession wrapper">
        <h1 class="font-black-20px title-second">Работа по профессиям</h1>
        <div class="cards">
            @foreach($professions as $profession)
                <a href="{{route('search_vacancy', 'position='.$profession->position)}}"><div class="card">
                    <h2 class="font-black-18px">{{$profession->position}}</h2>
                    <p class="font-black-17px">до {{$profession->max_salary}} ₽</p> 
                    <hr>    
                    <p class="font-blue-16px">{{$profession->count}} вакансии</p>
                </div></a>
            @endforeach
        </div>
    </section>
    <section class="work-by-industry wrapper">
        <h1 class="font-black-20px title-second">Работа по отраслям</h1>
        <div class="industries">
            <ul>
                @foreach($categories as $category)
                    @if($category->category_type=='Отрасль')
                        @if($category->id==16 || $category->id==25)
                            <ul>
                        @endif
                        <li class="industries-li"><a href="{{route('search_vacancy', 'categories%5B%5D='.$category->id)}}" class="font-light-16px">{{$category->category_name}}</a></li>
                        @if($category->id==15 || $category->id==24)
                            </ul>
                        @endif
                    @endif
                @endforeach
        </div>
    </section>
    <section class="by-schedule wrapper">
        <h1 class="font-black-20px title-second">По графику</h1>
        <ul class="by-schedule-list">
            @foreach($categories as $category)
                @if($category->category_type=='График работы')
                    <li><a href="{{route('search_vacancy', 'categories%5B%5D='.$category->id)}}" class="font-light-16px">{{$category->category_name}}</a></li>
                @endif
            @endforeach
        </ul>
    </section>
    <section class="about-us wrapper">
        <div class="about-us-left">
            <div class="about-us-text">
                <h1 class="font-black-20px">О нас</h1>
            </div>
            <div class="about-us-text">
                <p class="font-black-high-17px">TopVacancy – это современная онлайн-платформа, которая объединяет соискателей и работодателей, обеспечивая удобный и эффективный процесс поиска работы и подбора персонала.</p>
            </div>
            <div class="about-us-text">
                <p class="font-black-high-17px">Кому подходит сайт? <br>
                    • Соискателям – от начинающих специалистов до опытных профессионалов, ищущих новые карьерные возможности. <br>
                    • Работодателям – компаниям любого масштаба, желающим быстро находить квалифицированных сотрудников.</p>
            </div>
        </div>
        <img src="{{asset('assets//images/about-us.png')}}" alt="">
    </section>
@endsection