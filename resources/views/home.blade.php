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
                        <form action="#" method="post" class="home-search">
                            <input type="text" placeholder="Найти вакансию" class="search-field font-grey-16px">
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
            <div class="card">
                <h2 class="font-black-18px">Продавец-кассир</h2>
                <p class="font-black-17px">от 48 000 ₽</p>
                <hr>    
                <p class="font-black-15px">Пятерочка, Челябинск</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Продавец-кассир</h2>
                <p class="font-black-17px">от 48 000 ₽</p>
                <hr>    
                <p class="font-black-15px">Пятерочка, Челябинск</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Продавец-кассир</h2>
                <p class="font-black-17px">от 48 000 ₽</p>
                <hr>    
                <p class="font-black-15px">Пятерочка, Челябинск</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Продавец-кассир</h2>
                <p class="font-black-17px">от 48 000 ₽</p>
                <hr>    
                <p class="font-black-15px">Пятерочка, Челябинск</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Продавец-кассир</h2>
                <p class="font-black-17px">от 48 000 ₽</p>
                <hr>    
                <p class="font-black-15px">Пятерочка, Челябинск</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Продавец-кассир</h2>
                <p class="font-black-17px">от 48 000 ₽</p>
                <hr>    
                <p class="font-black-15px">Пятерочка, Челябинск</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Продавец-кассир</h2>
                <p class="font-black-17px">от 48 000 ₽</p>
                <hr>    
                <p class="font-black-15px">Пятерочка, Челябинск</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Продавец-кассир</h2>
                <p class="font-black-17px">от 48 000 ₽</p>
                <hr>    
                <p class="font-black-15px">Пятерочка, Челябинск</p>
            </div>
        </div>
    </section>
    <section class="companies wrapper">
        <h1 class="font-black-20px title-second">Компании</h1>
        <div class="cards-companies">
            <div class="card-company">
                <img src="{{asset('assets/images/perekrestok.png')}}" alt="">
                <h3 class="font-light-16px">Перекресток</h3>
            </div>
            <div class="card-company">
                <img src="{{asset('assets/images/perekrestok.png')}}" alt="">
                <h3 class="font-light-16px">Перекресток</h3>
            </div>
            <div class="card-company">
                <img src="{{asset('assets/images/perekrestok.png')}}" alt="">
                <h3 class="font-light-16px">Перекресток</h3>
            </div>
            <div class="card-company">
                <img src="{{asset('assets/images/perekrestok.png')}}" alt="">
                <h3 class="font-light-16px">Перекресток</h3>
            </div>
            <div class="card-company">
                <img src="{{asset('assets/images/perekrestok.png')}}" alt="">
                <h3 class="font-light-16px">Перекресток</h3>
            </div>
            <div class="card-company">
                <img src="{{asset('assets/images/perekrestok.png')}}" alt="">
                <h3 class="font-light-16px">Перекресток</h3>
            </div>
        </div>
    </section>
    <section class="work-by-profession wrapper">
        <h1 class="font-black-20px title-second">Работа по профессиям</h1>
        <div class="cards">
            <div class="card">
                <h2 class="font-black-18px">Инженер</h2>
                <p class="font-black-17px">до 250 000 ₽</p>
                <hr>    
                <p class="font-blue-16px">3 вакансии</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Инженер</h2>
                <p class="font-black-17px">до 250 000 ₽</p>
                <hr>    
                <p class="font-blue-16px">3 вакансии</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Инженер</h2>
                <p class="font-black-17px">до 250 000 ₽</p>
                <hr>    
                <p class="font-blue-16px">3 вакансии</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Инженер</h2>
                <p class="font-black-17px">до 250 000 ₽</p>
                <hr>    
                <p class="font-blue-16px">3 вакансии</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Инженер</h2>
                <p class="font-black-17px">до 250 000 ₽</p>
                <hr>    
                <p class="font-blue-16px">3 вакансии</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Инженер</h2>
                <p class="font-black-17px">до 250 000 ₽</p>
                <hr>    
                <p class="font-blue-16px">3 вакансии</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Инженер</h2>
                <p class="font-black-17px">до 250 000 ₽</p>
                <hr>    
                <p class="font-blue-16px">3 вакансии</p>
            </div>
            <div class="card">
                <h2 class="font-black-18px">Инженер</h2>
                <p class="font-black-17px">до 250 000 ₽</p>
                <hr>    
                <p class="font-blue-16px">3 вакансии</p>
            </div>
        </div>
    </section>
    <section class="work-by-industry wrapper">
        <h1 class="font-black-20px title-second">Работа по отраслям</h1>
        <div class="industries">
            <ul class="font-light-16px">
                <li>Медицина, фармацевтика</li>
                <li>Наука, образование</li>
                <li>Продажи, обслуживание клиентов</li>
                <li>Производство, сервисное обслуживание</li>
                <li>Рабочий персонал</li>
                <li>Розничная торговля</li>
                <li>Сельское хозяйство</li>
                <li>Спортивные клубы, фитнес, салоны красоты</li>
                <li>Стратегия, инвестиции, консалтинг</li>
            </ul>
            <ul class="font-light-16px">
                <li>Автомобильный бизнес</li>
                <li>Административный персонал</li>
                <li>Безопасность</li>
                <li>Высший и средний менеджмент</li>
                <li>Добыча сырья</li>
                <li>Домашний, обслуживающий персонал</li>
                <li>Закупки</li>
                <li>Информационные технологии</li>
                <li>Искусство, развлечения, массмедиа</li>
            </ul>
            <ul class="font-light-16px">
                <li>Маркетинг, реклама, PR</li>
                <li>Страхование</li>
                <li>Строительство, недвижимость</li>
                <li>Транспорт, логистика, перевозки</li>
                <li>Туризм, гостиницы, рестораны</li>
                <li>Управление персоналом, тренинги</li>
                <li>Финансы, бухгалтерия</li>
                <li>Юристы</li>
            </ul>
        </div>
    </section>
    <section class="by-schedule wrapper">
        <h1 class="font-black-20px title-second">По графику</h1>
        <ul class="by-schedule-list font-light-16px">
            <li>Работа вахтой</li>
            <li>1 через 3</li>
            <li>2 через 2</li>
            <li>1 через 1</li>
            <li>1 через 2</li>
            <li>1 через 4</li>
            <li>5 через 2</li>
            <li>Сменный график</li>
            <li>Неполный рабочий день</li>
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