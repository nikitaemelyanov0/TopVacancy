@extends('layout')

@section('title', 'Создание резюме')

@section('content')
    <div class="create-resume-vacancy container">
        <form action="" method="POST" enctype="multipart/form-data" class="font-black-18px">
            @csrf
            @if(isset($resume->id))
                @method('PUT')
            @endif
            <p>Укажите профессию</p>
            <input type="text" class="font-black-16px" name="profession" value="{{ old('profession', $resume->profession ?? '') }}"> <br>

            <p>Ваше фото</p>
            <div class="img-continer">

            </div>
            <input type="file" class="input-file" name="photo"> <br>

            <p>Номер телефона</p>
            <input type="phone" class="font-black-16px" name="phone" value="{{ old('phone', $resume->phone ?? '') }}"> <br>

            <p class="font-black-18px">Пол</p>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="gender" value="Мужчина" @checked(old('gender', $resume->gender ?? '') === 'Мужчина')>Мужской</label> <br>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="gender" value="Женщина" @checked(old('gender', $resume->gender ?? '') === 'Женщина')>Женский</label> <br>

            <p>Город, где вы живете</p>
            <input type="text" class="font-black-16px" name="city" value="{{ old('city', $resume->city ?? '') }}"> <br>

            <p>Дата рождения</p>
            <input type="date" class="font-black-16px" name="date_of_birth" value="{{ old('date_of_birth', $resume->date_of_birth ?? '') }}"> <br>

            <p>Желаемая зарплата</p>
            <input type="text" class="font-black-16px" name="salary_expectation" value="{{ old('salary_expectation', $resume->salary_expectation ?? '') }}"> <br>

            <p class="font-black-18px">Образование</p>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="education" value="Среднее" @checked(old('education', $resume->education ?? '') === 'Среднее')>Среднее</label> <br>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="education" value="Среднее профессиональное" @checked(old('education', $resume->education ?? '') === 'Среднее профессиональное')>Среднее профессиональное</label> <br>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="education" value="Неоконченное высшее" @checked(old('education', $resume->education ?? '') === 'Неоконченное высшее')>Неоконченное высшее</label> <br>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="education" value="Высшее" @checked(old('education', $resume->education ?? '') === 'Высшее')>Высшее</label> <br>

            <p>Название учебного заведения</p>
            <input type="text" class="font-black-16px" name="educational_institution" value="{{ old('educational_institution', $resume->educational_institution ?? '') }}"> <br>

            <p>Расскажите о себе</p>
            <textarea type="text" class="font-black-16px" name="description">{{ old('description', $resume->description ?? '') }}</textarea> <br>

            <button type="submit" class="btn-update font-white-17px">Сохранить</button>
        </form>
    </div>
@endsection