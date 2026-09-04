@extends('layout')

@section('title', 'TopVacancy | Избранные вакансии')

@section('content')
   <div class="application wrapper" style="min-height: 80vh">
        @if($favorites==false || $favorites->count()==0)
            <h2 class="font-black-20px">У вас еще нет избранных вакансий</h2>
        @else
            <h2 class="font-black-20px" style="margin-bottom: 30px">Ваши избранные вакансии</h2>
            @foreach($favorites as $favorite)
                <a href="{{route('vacancy.index', $favorite->vacancy->id)}}" class="a-vacancy">
                    <div class="card-vacancy">
                        <div style="display: flex; justify-content: space-between;">
                            <h4 class="font-black-23px">{{$favorite->vacancy->position}}</h4>
                            <a href="{{route('removeFromFavorites', $favorite->vacancy->id)}}">
                                <img src="{{ asset('assets/images/star-full.svg') }}" alt="" style="width: 30px">
                            </a>
                        </div>
                        <div class="card-vacancy-tags">
                            <h5 class="font-black-18px">
                                @if($favorite->vacancy->salary==null)
                                        Не указано
                                @else
                                    {{$favorite->vacancy->salary}}₽ за месяц
                                @endif
                            </h5>
                            <ul class="font-black-16px">
                                @foreach($favorite->vacancy->categories as $category)
                                    @if($category->category_type=='Опыт работы')
                                        {{$category->category_name}}
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <ul class="card-vacancy-list font-black-16px">
                            {{$favorite->vacancy->company->company_name}}
                            <li class="card-vacancy-list-locate"><img src="{{asset('assets/images/location-blue.png')}}" alt="">{{$favorite->vacancy->company->address}}</li>
                        </ul>
                    </div>
                </a>
            @endforeach
        @endif
   </div>
@endsection
