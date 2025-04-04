@extends('layout')

@section('title', 'Создание вакансии')

@section('content')
    <div class="create-resume-vacancy container">
        <form action="" method="POST" class="font-light-16px">
            <p class="font-black-18px">Название вакансии</p>
            <input type="text" class="font-black-16px"> <br>

            <p class="font-black-18px">Название компании</p>
            <input type="text" class="font-black-16px"> <br>

            <p class="font-black-18px">Логотип компании</p>
            <div class="img-continer">

            </div>
            <input type="file" class="input-file"> <br>

            <p class="font-black-18px">Номер телефона</p>
            <input type="text" class="font-black-16px"> <br>

            <p class="font-black-18px">Адрес работы</p>
            <input type="text" class="font-black-16px"> <br>

            <p class="font-black-18px">Зарплата</p>
            <input type="text" class="font-black-16px"> <br>

            <p class="font-black-18px">Подработка</p>
            <label for=""><input type="checkbox" class="checkbox-input">Неполный день</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">От 4 часов в день</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">По вечерам</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">По выходным</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Разовое задание</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Полная занятость</label> <br>

            <p class="font-black-18px">Отрасль</p>
            <label for=""><input type="checkbox" class="checkbox-input">Медицина, фармацевтика</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Наука, образование</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Продажи, обслуживание клиентов</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Производство, сервисное обслуживание</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Рабочий персонал</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Розничная торговля</label> <br>
            <h4 class="font-blue-16px">Показать все</h4>

            <p class="font-black-18px">Образование</p>
            <label for=""><input type="checkbox" class="checkbox-input">Не требуется или не указано</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Среднее профессиональное</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Неполное высшее</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Высшее</label> <br>

            <p class="font-black-18px">Опыт работы</p>
            <label for=""><input type="checkbox" class="checkbox-input">Без опыта или не имеет значения</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">От 1 до 3 лет</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">От 3 до 6 лет</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Более 6 лет</label> <br>

            <p class="font-black-18px">Формат работы</p>
            <label for=""><input type="checkbox" class="checkbox-input">На месте работодателя</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Удаленно</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Гибрид</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Разъездной</label> <br>

            <p class="font-black-18px">График работы</p>
            <label for=""><input type="checkbox" class="checkbox-input">Работа вахтой</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">1 через 3</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">2 через 2</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">1 через 1</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">1 через 2</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">1 через 4</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">5 через 2</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Неполный рабочий день</label> <br>
            <label for=""><input type="checkbox" class="checkbox-input">Сменный график</label> <br>

            <p class="font-black-18px">Расскажите о вакансии</p> 
            <textarea type="text" class="font-black-16px"></textarea> <br>

            <button type="submit" class="btn-update font-white-17px">Сохранить</button>
        </form>
    </div>
@endsection


