@extends('layout')

@section('title', 'Резюме')

@section('content')
   <div class="resume wrapper">
        <div class="resume-header">
            <div class="resume-header-left">

            </div>
            <div class="resume-header-right">
                <h1 class="font-black-23px">Системный администратор</h1>
                <h2 class="font-black-21px">Иванов Иван</h2>
                <h3 class="font-black-21px">90 000 ₽</h3>
                <p class="font-black-high-17px">Мужчина 29 лет</p>
                <span class="font-black-high-17px">Челябинск</span>
            </div>
        </div>
        <div class="resume-body">
            <p class="font-black-high-17px">Образование: Среднее профессиональное</p>
            <p class="font-black-high-17px">Место учебы: ГБПОУ ЧРТ</p>
            <p class="font-black-high-17px">Номер телефона: 79128328282</p>
            <p class="font-black-high-17px">Почта: ivan123@gmail.com</p>
            <p class="font-black-high-17px">Обо мне: 
                Опыт работы :active directory, kaspersky security center, kaspersky endpoint security,total network inventory, sccm, vmware, сети, принтера.Настройка и Администрирование серверов, систем видеонаблюдения и прочего сетевого оборудования.Удаленная помощь и консультация пользователей.Ответственный и исполнительный. Стремление в развитии новых навыков. Быстрая адаптация к текущим задачам.Начал обучение на высшее образование.
                Опыт работы 8 лет 5 месяцев</p>
        </div>
        <div class="btns-update-delete">
            <button class="btn-update font-white-17px">Изменить</button>
            <button class="btn-delete font-white-17px">Удалить</button>
        </div>
   </div>
@endsection


