@extends('layout')

@section('title', 'Создание резюме')

@section('content')
    <div class="create-resume-vacancy container">
        <form action="" method="POST" class="font-black-18px">
            <p>Укажите профессию</p>
            <input type="text" class="font-black-16px"> <br>

            <p>Ваше фото</p>
            <div class="img-continer">

            </div>
            <input type="file" class="input-file"> <br>

            <p>Номер телефона</p>
            <input type="text" class="font-black-16px"> <br>

            <p class="font-black-18px">Пол</p>
            <label for="" class="font-light-16px"><input type="checkbox" class="checkbox-input">Мужской</label> <br>
            <label for="" class="font-light-16px"><input type="checkbox" class="checkbox-input">Женский</label> <br>

            <p>Город, где вы живете</p> 
            <input type="text" class="font-black-16px"> <br>
            
            <p>Дата рождения</p>
            <input type="date" class="font-black-16px"> <br>

            <p>Желаемая зарплата</p>
            <input type="text" class="font-black-16px"> <br>
            
            <p class="font-black-18px">Образование</p>
            <label for="" class="font-light-16px"><input type="checkbox" class="checkbox-input">Среднее профессиональное</label> <br>
            <label for="" class="font-light-16px"><input type="checkbox" class="checkbox-input">Неполное высшее</label> <br>
            <label for="" class="font-light-16px"><input type="checkbox" class="checkbox-input">Высшее</label> <br>

            <p>Название учебного заведения</p>
            <input type="text" class="font-black-16px"> <br>
            
            <p>Расскажите о себе</p> 
            <textarea type="text" class="font-black-16px"></textarea> <br>

            <button type="submit" class="btn-update font-white-17px">Сохранить</button>
        </form>
    </div>
@endsection


