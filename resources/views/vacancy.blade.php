@extends('layout')

@section('title', 'Вакансия')

@section('content')
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
                <button class="btn-aplication font-white-17px">Откликнуться</button>
                <button class="btn-contacts font-blue-17px">Контакты</button>
            </div>
        </div>
        <div class="vacancy-header-right">
            <img src="{{asset('public/storage/'.$vacancy->logo)}}" alt="" style="width: 70px">
            <h3 class="font-black-19px">{{$vacancy->company_name}}</h3>
        </div>
    </div>
    <div class="vacancy-description wrapper">
        <p class="vacancy-description-text font-black-high-17px">{{$vacancy->description}}</p>
        <p class="vacancy-description-locate font-black-light-18px">
            Вакансия опубликована {{$vacancy->created_at}}<br>
            {{$vacancy->address}}
        </p>
        @if($currentuser->id==$vacancy->user_id)
            <div class="btns-update-delete">
                <a href="{{route('vacancy.edit', $vacancy->id)}}" class="btn-update font-white-17px">Изменить</a>
                <form method="POST" action="{{route('vacancy.destroy', $vacancy->id)}}" style="width: 140px">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete font-white-17px" type="submit">Удалить</button>
                </form>
            </div>
        @endif
    </div>
    <div class="related-vacancies wrapper">
        <h3 class="font-black-20px">Похожие вакансии</h3>
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
                <li class="card-vacancy-list-locate"><img src="public/images/location-blue.png" alt=""> Челябинск</li>
            </ul>
            <div class="btns-aplication-contacts-small">
                <button class="btn-aplication-small font-white-17px">Откликнуться</button>
                <button class="btn-contacts-small font-blue-17px">Контакты</button>
            </div>
        </div>
    </div>
@endsection