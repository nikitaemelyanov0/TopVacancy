@extends('layout')

@section('title', 'Вакансия')

@section('content')
    <div class="vacancy-header wrapper">
        <div class="vacancy-header-left">
            <h1 class="font-black-30px">Продавец-кассир </h1>
            <h2 class="font-black-21px">от 48 000 ₽ за месяц</h2>
            <ul class="font-black-17px">
                <li>Опыт работы: не требуется</li>
                <li>Полная занятость</li>
                <li>График: 5/2</li>
                <li>Формат работы: На месте работодателя</li>
            </ul>
            <div class="btns-aplication-contacts">
                <button class="btn-aplication font-white-17px">Откликнуться</button>
                 <button class="btn-contacts font-blue-17px">Контакты</button>
            </div>
        </div>
        <div class="vacancy-header-right">
            <img src="{{asset('assets\images\mts.png')}}" alt="">
            <h3 class="font-black-19px">Пятерочка</h3>
        </div>
    </div>
    <div class="vacancy-description wrapper">
        <p class="vacancy-description-text font-black-high-17px">В дружную команду кондитерских требуется продавец-кассир
            <br>
            <br>
            Условия:
            - З/п оклад + % от продаж ( от 45 000 и выше, выплаты строго без задержек)
            - График работы 5/2 с 8 до 5
            - Обеспечим Вас красивой формой
            Требования:
            - наличие опыта в продажах станет для вас преимуществом, наличие сан книжки или готовность ее оформить, готовность работать и развиваться.
            <br>
            <br>
            Обязанности:
            - Продажа готовой продукции, которая производится на предприятии
            - Выкладка готовой продукции на витрину, следить за ценниками
            - Обслуживание гостей и помощь в выборе блюд
            - Быть активным и общительным с посетителями
            - Содержать рабочее место в чистоте, соблюдение внутренних правил на предприятии.
        </p>
        <p class="vacancy-description-locate font-black-light-18px">
            Вакансия опубликована 19 февраля 2025 в Челябинске <br>
            Челябинск, улица Чичерина, 38Б
        </p>
        <div class="btns-update-delete">
            <button class="btn-update font-white-17px">Изменить</button>
            <button class="btn-delete font-white-17px">Удалить</button>
        </div>
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
                <li class="card-vacancy-list-locate"><img src="{{asset('assets\images\location-blue.png')}}" alt=""> Челябинск</li>
            </ul>
            <div class="btns-aplication-contacts-small">
                <button class="btn-aplication-small font-white-17px">Откликнуться</button>
                <button class="btn-contacts-small font-blue-17px">Контакты</button>
            </div>
        </div>
    </div>
@endsection