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
            @error('profession')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p>Ваше фото</p>
            <div class="img-continer">
                <div class="continer-preview">
                    <img class="img-preview" src="{{asset($resume->photo)}}" alt="" style="height: 165px; width: 165px; object-fit: cover;">
                </div>
            </div>
            <input type="file" class="input-file" name="photo" value="{{ old('photo', $resume->photo ?? '') }}"> <br>

            <p>Номер телефона</p>
            <input type="phone" class="font-black-16px" name="phone" value="{{ old('phone', $resume->phone ?? '') }}"> <br>
            @error('phone')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p class="font-black-18px">Пол</p>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="gender" value="Мужчина" @checked(old('gender', $resume->gender ?? '') === 'Мужчина')>Мужской</label> <br>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="gender" value="Женщина" @checked(old('gender', $resume->gender ?? '') === 'Женщина')>Женский</label> <br>
            @error('gender')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p>Город, где вы живете</p>
            <input type="text" class="font-black-16px" name="city" value="{{ old('city', $resume->city ?? '') }}"> <br>
            @error('city')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p>Дата рождения</p>
            <input type="date" class="font-black-16px" name="date_of_birth" value="{{ old('date_of_birth', $resume->date_of_birth ?? '') }}"> <br>
            @error('date_of_birth')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p>Желаемая зарплата</p>
            <input type="text" class="font-black-16px" name="salary_expectation" value="{{ old('salary_expectation', $resume->salary_expectation ?? '') }}"> <br>
            @error('salary_expectation')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p class="font-black-18px">Образование</p>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="education" value="Среднее" @checked(old('education', $resume->education ?? '') === 'Среднее')>Среднее</label> <br>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="education" value="Среднее профессиональное" @checked(old('education', $resume->education ?? '') === 'Среднее профессиональное')>Среднее профессиональное</label> <br>
            <label for="" class="font-light-16px"><input type="radio" class="checkbox-input" name="education" value="Высшее" @checked(old('education', $resume->education ?? '') === 'Высшее')>Высшее</label> <br>
            @error('education')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p>Название учебного заведения</p>
            <input type="text" class="font-black-16px" name="educational_institution" value="{{ old('educational_institution', $resume->educational_institution ?? '') }}"> <br>
            @error('educational_institution')
            <em class="font-red-small">{{$message}}</em>
            @enderror

            <p>Расскажите о себе</p>
            <textarea type="text" class="font-black-16px" name="description">{{ old('description', $resume->description ?? '') }}</textarea>
            @error('description')
            <em class="font-red-small">{{$message}}</em>
            @enderror
            <br>

            <button type="submit" class="btn-update font-white-17px" style="margin-top: 50px">Сохранить</button>
        </form>
    </div>
@endsection