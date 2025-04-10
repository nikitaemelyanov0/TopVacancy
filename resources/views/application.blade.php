@extends('layout')

@section('title', 'Отклики')

@section('content')
   <div class="application wrapper">
        @foreach($currentuser->vacancies as $vacancy)
            <a href="{{route('vacancy.index', $vacancy->id)}}" class="a-vacancy"><div class="card-vacancy">
                <h4 class="font-black-23px">{{$vacancy->position}}</h4>
                <div class="card-vacancy-tags">
                    <h5 class="font-black-18px">{{$vacancy->salary}}₽ за месяц</h5>
                    <ul class="font-black-16px">
                        @foreach($vacancy->categories as $category)
                            @if($category->category_type=='Опыт работы')
                                {{$category->category_name}}
                            @endif
                        @endforeach
                    </ul>
                </div>
                <ul class="card-vacancy-list font-black-16px">
                    {{$vacancy->company_name}}
                    <li class="card-vacancy-list-locate"><img src="{{asset('assets/images/location-blue.png')}}" alt="">{{$vacancy->address}}</li>
                </ul>
            </div></a>
                @foreach($vacancy->resumes as $resume)
                    @if($loop->first)
                        <div class="application-body">
                        <h1 class="font-black-20px">Отклики</h1>
                    @endif
                        <a href="{{route('resume.index', $resume->id)}}"><div class="resume-header">
                        <div class="resume-header-left">
                                <img src="{{asset('storage/'.$resume->photo)}}" alt="">
                        </div>
                        <div class="resume-header-right">
                            <h1 class="font-black-20px">{{$resume->profession}}</h1>
                            <h2 class="font-black-19px">{{$resume->user->user_name}}</h2>
                            <h3 class="font-black-19px">{{$resume->salary_expectation}}₽ за месяц</h3>
                            <p class="font-black-high-17px">{{$resume->gender}} {{$resume->date_of_birth}}</p>
                            <span class="font-black-high-17px">{{$resume->city}}</span>
                        </div>
                        </div>
                    </div></a>
                @endforeach
        @endforeach
   </div>
@endsection