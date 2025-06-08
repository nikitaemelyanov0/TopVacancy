@extends('layout')

@section('title', 'Вакансия')

@section('content')
    <div class="contacts hide" id="{{$vacancy->id}}">
        <div class="contacts-inner">
            <img src="{{asset('assets/images/cross.png')}}" alt="" class="cross" id="{{$vacancy->id}}">
            <p class="font-black-17px">Номер телефона: {{$vacancy->phone}}</p>
            <p class="font-black-17px">Почта: {{$vacancy->user->email}}</p>
        </div>
    </div>
    <div class="vacancy-header wrapper">
        <div class="vacancy-header-left">
            <h1 class="font-black-30px">{{$vacancy->position}}</h1>
            <h2 class="font-black-21px">{{$vacancy->salary}}₽ за месяц</h2>
            <ul class="font-black-17px">
                @foreach($categories as $category)
                    <li>{{$category->category_type.': '.$category->category_name}}</li>
                @endforeach
            </ul>
            <div class="btns-aplication-contacts">
                <form action="{{route('application.store', $vacancy->id)}}" method="POST" style="width: min(100%, 413px);">
                    @csrf
                    <button class="btn-aplication font-white-17px" type="submit">Откликнуться</button>
                </form>
                <button class="btn-contacts font-blue-17px" id="{{$vacancy->id}}">Контакты</button>
            </div>
        </div>
        <div class="vacancy-header-right">
            <img src="{{asset($vacancy->logo)}}" alt="" style="width: 70px; height: 70px; object-fit: cover;">
            <h3 class="font-black-19px">{{$vacancy->company_name}}</h3>
        </div>
    </div>
    <div class="vacancy-description wrapper">
        <p class="vacancy-description-text font-black-high-17px">{{$vacancy->description}}</p>
        <p class="vacancy-description-locate font-black-light-18px">
            Вакансия опубликована {{$vacancy->created_at}}<br>
            {{$vacancy->address}}
        </p>
        @if($currentuser!=null)
            @if($currentuser->id==$vacancy->user_id || $currentuser->role=='admin')
                <div class="btns-update-delete">
                    <a href="{{route('vacancy.edit', $vacancy->id)}}" class="btn-update font-white-17px">Изменить</a>
                    <form method="POST" action="{{route('vacancy.destroy', $vacancy->id)}}" style="width: 140px">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete font-white-17px" type="submit">Удалить</button>
                    </form>
                </div>
            @endif
        @endif
    </div>
    <div class="related-vacancies wrapper">
        @if($vacancies->count()>1)
            <h3 class="font-black-20px">Похожие вакансии</h3>
            @foreach($vacancies->take(10) as $vacancyrelete)
                @if($vacancyrelete->id!=$vacancy->id)
                    <a href="{{route('vacancy.index', $vacancyrelete->id)}}"><div class="card-vacancy">
                            <h4 class="font-black-23px">{{$vacancyrelete->position}}</h4>
                            <div class="card-vacancy-tags">
                                <h5 class="font-black-18px">{{$vacancyrelete->salary}}₽ за месяц</h5>
                                <ul class="font-black-16px">
                                    @foreach($vacancyrelete->categories as $category)
                                        @if($category->category_type=='Опыт работы')
                                            {{$category->category_name}}
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <ul class="card-vacancy-list font-black-16px">
                                <li>{{$vacancyrelete->company_name}}</li>
                                <li class="card-vacancy-list-locate"><img src="public/images/location-blue.png" alt="">{{$vacancyrelete->address}}</li>
                            </ul></a>
                            <div class="btns-aplication-contacts-small">
                                <form action="{{route('application.store', $vacancyrelete->id)}}" method="POST" style="width: min(100%, 227px);">
                                    @csrf
                                    <button class="btn-aplication-small font-white-17px" type="submit">Откликнуться</button>
                                </form>
                                <button class="btn-contacts-small font-blue-17px">Контакты</button>
                            </div>
                        </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
