@extends('layout')

@section('title', 'Компания')

@section('content')
    <div class="resume wrapper" style="min-height: 80vh">
        <div class="resume-header" style="align-items: flex-start"> 
            <div>
                <img src="{{ asset($company->logo) }}" alt="" style="width: 211px; height: 211px; object-fit: cover;">  
            </div>
            <div class="resume-header-right">
                <h1 class="font-black-23px">{{$company->company_name}}</h1>
                <ul class="card-vacancy-list font-black-16px">
                    <li class="card-vacancy-list-locate" style="margin-top: 25px"><img src="{{asset('assets/images/location-blue.png')}}" alt="">{{$company->address}}</li>
                </ul>
                <ul class="card-vacancy-list font-black-16px" style="margin-top: 30px">
                    <li class="card-vacancy-list-locate">{{$company->phone}}</li>
                    <li class="card-vacancy-list-locate">{{$company->email}}</li>
                </ul>
                <ul class="card-vacancy-list font-black-16px">
                    <li class="card-vacancy-list-locate"></li>
                    @if($reviews->isEmpty())
                        <li class="card-vacancy-list-locate" style="margin-top: 22px">Нет отзывов</li>
                    @else
                        <li class="card-vacancy-list-locate" style="margin-top: 22px">{{$reviews->count()}} отзыва</li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="resume-body">
            <p class="font-black-high-17px">О нас: <br> {!! nl2br(e($company->description)) !!}</p>
        </div>
        @if(Auth::user()!=null)
            @if(Auth::user()->id==$company->user_id  || $currentuser->role=='admin')
                <div class="btns-update-delete">
                    <a href="{{route('company.edit', $company)}}" class="btn-update font-white-17px hover">Изменить</a>
                    <form method="POST" action="{{route('company.destroy', $company->id)}}" style="width: 140px">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete font-white-17px" type="submit">Удалить</button>
                    </form>
                </div>
            @endif
        @endif
        <h3 class="font-black-19px" style="margin-bottom: 30px; margin-top: 60px;">Вакансии</h3>
        @foreach($vacancies as $vacancy)
            <a href="{{route('vacancy.index', $vacancy->id)}}"><div class="card-vacancy">
                    <h4 class="font-black-23px">{{$vacancy->position}}</h4>
                    <div class="card-vacancy-tags">
                        <h5 class="font-black-18px">
                            @if($vacancy->salary==null)
                                Не указано
                            @else
                                {{$vacancy->salary}}₽ за месяц
                            @endif
                        </h5>
                        <ul class="font-black-16px">
                            @foreach($vacancy->categories as $category)
                                @if($category->category_type=='Опыт работы')
                                    {{$category->category_name}}
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <ul class="card-vacancy-list font-black-16px">
                        <li>{{$vacancy->company->company_name}}</li>
                        <li class="card-vacancy-list-locate"><img src="{{asset('assets/images/location-blue.png')}}" alt="">{{$vacancy->company->address}}</li>
                    </ul></a>
                    <div class="btns-aplication-contacts-small">
                        <form action="{{route('application.store', $vacancy->id)}}" method="POST" style="width: min(100%, 227px);">
                            @csrf
                            <button class="btn-aplication-small font-white-17px" type="submit">Откликнуться</button>
                        </form>
                        <button class="btn-contacts-small font-blue-17px">Контакты</button>
                    </div>
                </div>

                <div class="contacts hide" id="{{$vacancy->id}}">
                    <div class="contacts-inner">
                    <img src="{{asset('assets/images/cross.png')}}" alt="" class="cross" id="{{$vacancy->id}}">
                    <p class="font-black-17px">Номер телефона: {{$vacancy->company->phone}}</p>
                    <p class="font-black-17px">Почта: {{$vacancy->company->email}}</p>
                </div>
        </div>
        @endforeach
        @if(!$reviews->isEmpty())
            <h3 class="font-black-19px" style="margin-bottom: 30px; margin-top: 60px;">Отзывы</h3>  
        @endif
        @if(!Auth::user()->review()->where('company_id', $company->id)->exists() && $company->user_id != Auth::id())
            <a href="{{ route('review.index', $company) }}"><button class="btn-aplication-small font-white-17px" style="width: min(100%, 170px);" type="submit">Оставить отзыв</button></a>  
        @endif
        @foreach($reviews as $review)
            <div class="review">
                <ul class="line_text">  
                    <li class="font-black-20px">{{ $review->user->user_name }}</li>
                    <li class="font-black-18px">{{ $review->grade }}</li>
                    <div class="rating-view" style=" margin-left: -10px;">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="
                                star
                                {{ $review->grade >= $i ? 'full' : '' }}
                                {{ $review->grade >= $i - 0.5 && $review->grade < $i ? 'half' : '' }}
                            " style="width: 18px; margin-bottom: -4px;"></span>
                        @endfor
                    </div>
                </ul>
                <p class="font-black-high-17px">{{ $review->message }}</p>
            </div>
        @endforeach
    </div>
@endsection
