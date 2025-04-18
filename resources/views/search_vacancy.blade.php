@extends('layout')

@section('title', 'Поиск вакансий')

@section('content')
    <div class="search-field-big wrapper">
        <form action="{{route('search_vacancy')}}" method="GET" class="search-field-big-form">
            <img src="{{asset('assets/images/glass.png')}}" alt="" class="glass-second">
            <input type="text" name="position" placeholder="Найти вакансию" class="search-field-big-input font-grey-16px" value="{{request('position')}}">
            <button type="submit" class="btn-search-big font-white-16px">Найти</button>
    </div>
    <div class="search-vacancy-body wrapper">
        <div class="search-vacancy-left">
            <h2 class="font-black-20px-regular">Найдено {{count($vacancies)}} вакансий</h2>
            <p class="hide-filters font-blue-16px">Скрыть фильтры</p>
            <div class="search-vacancy-sort">
                <select name="sort" id="sort" onchange="this.form.submit()" class="search-vacancy-sort-select font-black-17px">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }} class="font-black-16px">Сначала новые</option>
                    <option value="salary_asc" {{ request('sort') == 'salary_asc' ? 'selected' : '' }} class="font-black-16px">Зарплата по возрастанию</option>
                    <option value="salary_desc" {{ request('sort') == 'salary_desc' ? 'selected' : '' }} class="font-black-16px">Зарплата по убыванию</option>
                </select>
            </div>
            <div class="search-vacancy-filter">
                    <h4 class="font-black-18px">Подработка</h4>
                    @foreach($categories as $category)
                        @if($category->category_type=='Подработка')
                            <label class="font-light-16px" class="font-light-16px" for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(collect(request('categories'))->contains($category->id))>{{$category->category_name}}</label> <br>
                        @endif
                    @endforeach

                    <h4 class="font-black-18px">Уровень дохода</h4>
                    <input type="text" placeholder="от" class="search-vacancy-filter-input font-grey-light-16px" name="salary" value="{{request('salary')}}">

                    <h4 class="font-black-18px">Город</h4>
                    <input type="text" placeholder="Введите название" class="search-vacancy-filter-input font-grey-light-16px" name="address" value="{{ request()->has('address') ? request('address') : (old('address') ?? 'Челябинск' }}">

                    <h4 class="font-black-18px">Отрасль</h4>
                    <div class="industries-hide">
                        @foreach($categories as $category)
                            @if($category->category_type=='Отрасль')
                                <label class="font-light-16px" for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(collect(request('categories'))->contains($category->id))>{{$category->category_name}}</label> <br>
                            @endif
                        @endforeach
                    </div>
                    <p class="font-blue-16px show-industries" style="margin-top: 13px; cursor: pointer">Показать все</p>

                    <h4 class="font-black-18px">Образование</h4>
                    @foreach($categories as $category)
                        @if($category->category_type=='Образование')
                            <label class="font-light-16px" for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(collect(request('categories'))->contains($category->id))>{{$category->category_name}}</label> <br>
                        @endif
                    @endforeach

                    <h4 class="font-black-18px">Опыт работы</h4>
                    @foreach($categories as $category)
                        @if($category->category_type=='Опыт работы')
                            <label class="font-light-16px" for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(collect(request('categories'))->contains($category->id))>{{$category->category_name}}</label> <br>
                        @endif
                    @endforeach

                    <h4 class="font-black-18px">Формат работы</h4>
                    @foreach($categories as $category)
                        @if($category->category_type=='Формат работы')
                            <label class="font-light-16px" for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(collect(request('categories'))->contains($category->id))>{{$category->category_name}}</label> <br>
                        @endif
                    @endforeach

                    <h4 class="font-black-18px">График работы</h4>
                    @foreach($categories as $category)
                        @if($category->category_type=='График работы')
                            <label class="font-light-16px" for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(collect(request('categories'))->contains($category->id))>{{$category->category_name}}</label> <br>
                        @endif
                    @endforeach
                    <a href="{{route('search_vacancy', 'position=&sort=newest&salary=&address=')}}" class="font-blue-16px btn-reset hover">Сбросить все</a>
                </form>
            </div>
        </div>
        <div class="search-vacancy-right">
            @foreach($vacancies as $vacancy)
                <a href="{{route('vacancy.index', $vacancy->id)}}"><div class="card-vacancy">
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
                        <li>{{$vacancy->company_name}}</li>
                        <li class="card-vacancy-list-locate"><img src="{{asset('assets/images/location-blue.png')}}" alt="">{{$vacancy->address}}</li>
                    </ul></a>
                        <div class="btns-aplication-contacts-small">
                            <form action="{{route('application.store', $vacancy->id)}}" method="POST" style="width: min(100%, 227px);">
                                @csrf
                                <button class="btn-aplication-small font-white-17px" type="submit">Откликнуться</button>
                            </form>
                            <button class="btn-contacts-small font-blue-17px" id="{{$vacancy->id}}">Контакты</button>
                        </div>
                </div>

                <div class="contacts hide" id="{{$vacancy->id}}">
                    <div class="contacts-inner">
                        <img src="{{asset('assets/images/cross.png')}}" alt="" class="cross" id="{{$vacancy->id}}">
                        <p class="font-black-17px">Номер телефона: {{$vacancy->phone}}</p>
                        <p class="font-black-17px">Почта: {{$vacancy->user->email}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
