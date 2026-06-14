@extends('layout')

@section('title', 'TopVacancy | Вакансия ' .$vacancy->position)

@section('content')
    <div class="contacts hide" id="{{$vacancy->id}}">
        <div class="contacts-inner">
            <img src="{{asset('assets/images/cross.png')}}" alt="" class="cross" id="{{$vacancy->id}}">
            <p class="font-black-17px">Номер телефона: {{$vacancy->company->phone}}</p>
            <p class="font-black-17px">Почта: {{$vacancy->company->email}}</p>
        </div>
    </div>
    <div class="vacancy-header wrapper">
        <div class="vacancy-header-left">
            <h1 class="font-black-30px">{{$vacancy->position}}</h1>
            <h2 class="font-black-21px">
                @if($vacancy->salary==null)
                    Не указано
                @else
                    {{$vacancy->salary}}₽ за месяц
                @endif
            </h2>
            <ul class="font-black-17px">
                @foreach($categories as $category)
                    <li>{{$category->category_type.': '.$category->category_name}}</li>
                @endforeach
            </ul>
            <div class="btns-aplication-contacts">
                <form action="{{route('application.store', $vacancy->id)}}" method="POST" style="width: min(100%, 413px);">
                    @csrf
                    @if (Auth::user())
                        @if($vacancy->resumes->contains(Auth::user()->resume))
                            <button class="btn-aplication font-blue-17px" type="submit" style="background-color: white; border: 1px solid #2584C9;">Вы откликнулись</button>
                        @else
                            <button class="btn-aplication font-white-17px" type="submit">Откликнуться</button>
                        @endif
                    @else
                        <button class="btn-aplication font-white-17px" type="submit">Откликнуться</button>
                    @endif
                </form>
                <button class="btn-contacts font-blue-17px" id="{{$vacancy->id}}">Контакты</button>
            </div>
        </div>
        <a href="{{route('company.index', $vacancy->company)}}" class="vacancy-header-right">
            <div style="display: flex; align-items: center; gap: 20px">
                <img src="{{asset($vacancy->company->logo)}}" alt="" style="width: 70px; height: 70px; object-fit: cover;">
                <h3 class="font-black-19px">{{$vacancy->company->company_name}}</h3>
            </div>
            <div style="margin-top: 25px; display: flex; justify-content: space-between;  align-items: center;">
                @if($vacancy->company->reviews->isEmpty())
                    <div>
                        <p class="font-black-17px">0 отзывов</p>
                    </div> 
                @else
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
                        <p class="font-black-17px">{{$reviewsAvg}}</p>
                        <div class="rating-view">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="
                                    star
                                    {{ $reviewsAvg >= $i ? 'full' : '' }}
                                    {{ $reviewsAvg >= $i - 0.5 && $reviewsAvg < $i ? 'half' : '' }}
                                " style="width: 18px;"></span>
                            @endfor
                        </div>
                    </div>
                    <div>
                        <p class="font-black-17px">{{$reviewsCount}} отзывов</p>
                    </div>  
                @endif
            </div>
        </a>
    </div>
    <div class="vacancy-description wrapper">
        <p class="vacancy-description-text font-black-high-17px">{!! nl2br(e($vacancy->description)) !!}</p>
        <p class="vacancy-description-locate font-black-light-18px">
            Вакансия опубликована {{$vacancy->created_at}}<br>
            {{$vacancy->address}}
        </p>
        @if(Auth::user()!=null)
            @if(Auth::user()->id==$vacancy->company->user_id || $currentuser->role=='admin')
                <div class="btns-update-delete">
                    <a href="{{route('vacancy.edit', $vacancy->id)}}" class="btn-update font-white-17px">Изменить</a>
                    <form method="POST" action="{{route('vacancy.destroy', $vacancy->id)}}" style="width: 140px" onsubmit="return confirm('Вы уверены, что хотите удалить вашу вакансию?')">
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
                                <li>{{$vacancyrelete->company->company_name}}</li>
                                <li class="card-vacancy-list-locate"><img src="{{asset('assets/images/location-blue.png')}}" alt="">{{$vacancyrelete->company->address}}</li>
                            </ul></a>
                            <div class="btns-aplication-contacts-small">
                                <form action="{{route('application.store', $vacancyrelete->id)}}" method="POST" style="width: min(100%, 227px);">
                                    @csrf
                                    @if (Auth::user())
                                        @if($vacancyrelete->resumes->contains(Auth::user()->resume))
                                            <button class="btn-aplication-small font-blue-17px" type="submit" style="background-color: white; border: 1px solid #2584C9;">Вы откликнулись</button>
                                        @else
                                            <button class="btn-aplication-small font-white-17px" type="submit">Откликнуться</button>
                                        @endif
                                    @else
                                        <button class="btn-aplication-small font-white-17px" type="submit">Откликнуться</button>
                                    @endif
                                </form>
                                <button class="btn-contacts-small font-blue-17px">Контакты</button>
                            </div>
                        </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
