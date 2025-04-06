@extends('layout')

@section('title', 'Поиск вакансий')

@section('content')
    <div class="search-field-big wrapper">
        <form action="" method="POST" class="search-field-big-form">
            <img src="{{asset('assets/images/glass.png')}}" alt="" class="glass-second">
            <input type="text" name="" placeholder="Найти вакансию" class="search-field-big-input font-grey-16px">
            <button type="submit" class="btn-search-big font-white-16px">Найти</button>
        </form>
    </div>
    <div class="search-vacancy-body wrapper">
        <div class="search-vacancy-left">
            <h2 class="font-black-20px-regular">Найдено 10 вакансий </h2>
            <div class="search-vacancy-sort">
                <h3 class="font-light-16px">По соответствию</h3>
                <img src="\images\show.png" alt="">
            </div>
            <div class="search-vacancy-filter">
                <form action="" method="POST" class="font-light-16px">
                    <h4 class="font-black-18px">Подработка</h4>
                    <label for=""><input type="checkbox" class="checkbox-input">Неполный день</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">От 4 часов в день</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">По вечерам</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">По выходным</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Разовое задание</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Полная занятость</label> <br>

                    <h4 class="font-black-18px">Уровень дохода</h4>
                    <input type="text" placeholder="от" class="search-vacancy-filter-input font-grey-light-16px">

                    <h4 class="font-black-18px">Город</h4>
                    <input type="text" placeholder="Введите название" class="search-vacancy-filter-input font-grey-light-16px">

                    <h4 class="font-black-18px">Отрасль</h4>
                    <label for=""><input type="checkbox" class="checkbox-input">Медицина, фармацевтика</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Наука, образование</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Продажи, обслуживание клиентов</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Производство, сервисное обслуживание</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Рабочий персонал</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Розничная торговля</label> <br>
                    <p class="font-blue-16px">Показать все</p>

                    <h4 class="font-black-18px">Образование</h4>
                    <label for=""><input type="checkbox" class="checkbox-input">Не требуется или не указано</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Среднее профессиональное</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Неполное высшее</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Высшее</label> <br>

                    <h4 class="font-black-18px">Опыт работы</h4>
                    <label for=""><input type="checkbox" class="checkbox-input">Без опыта или не имеет значения</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">От 1 до 3 лет</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">От 3 до 6 лет</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Более 6 лет</label> <br>

                    <h4 class="font-black-18px">Формат работы</h4>
                    <label for=""><input type="checkbox" class="checkbox-input">На месте работодателя</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Удаленно</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Гибрид</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Разъездной</label> <br>

                    <h4 class="font-black-18px">График работы</h4>
                    <label for=""><input type="checkbox" class="checkbox-input">Работа вахтой</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">1 через 3</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">2 через 2</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">1 через 1</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">1 через 2</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">1 через 4</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">5 через 2</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Неполный рабочий день</label> <br>
                    <label for=""><input type="checkbox" class="checkbox-input">Сменный график</label> <br>
                    <button type="reset" class="font-blue-16px btn-reset">Сбросить все</button> <br>
                </form>
            </div>
        </div>
        <div class="search-vacancy-right">
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
                    <li class="card-vacancy-list-locate"><img src="{{asset('assets\images\location-blue.png')}}" alt=""> Челябинск</li>
                </ul>
                <div class="btns-aplication-contacts-small">
                    <button class="btn-aplication-small font-white-17px">Откликнуться</button>
                    <button class="btn-contacts-small font-blue-17px">Контакты</button>
                </div>
            </div>
            
        </div>
    </div>
@endsection