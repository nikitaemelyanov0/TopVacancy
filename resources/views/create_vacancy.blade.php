@extends('layout')

@section('title', 'Создание вакансии')

@section('content')
    <div class="create-resume-vacancy container">
        <form action="" method="POST" enctype="multipart/form-data" class="font-light-16px">
            @csrf
            @if(isset($vacancy->id))
                @method('PUT')
            @endif
            <p class="font-black-18px">Название вакансии</p>
            <input type="text" class="font-black-16px" name="position" value="{{ old('position', $vacancy->position ?? '') }}"> <br>
            @error('position')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p class="font-black-18px">Название компании</p>
            <input type="text" class="font-black-16px" name="company_name" value="{{ old('company_name', $vacancy->company_name ?? '') }}"> <br>
            @error('company_name')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p class="font-black-18px">Логотип компании</p>
            <div class="img-continer">
                <div class="continer-preview">
                    <img class="img-preview" src="{{asset($vacancy->logo)}}" alt="" style="height: 165px; width: 165px; object-fit: cover;">
                </div>
            </div>
            <input type="file" class="input-file" name="logo" value="{{ old('logo', $vacancy->logo ?? '') }}"> <br>

            <p class="font-black-18px">Номер телефона</p>
            <input type="text" class="font-black-16px" name="phone" value="{{ old('phone', $vacancy->phone ?? '') }}"> <br>
            @error('phone')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p class="font-black-18px">Адрес работы</p>
            <input type="text" class="font-black-16px" name="address" value="{{ old('address', $vacancy->address ?? '') }}"> <br>
            @error('address')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p class="font-black-18px">Зарплата</p>
            <input type="text" class="font-black-16px" name="salary" value="{{ old('salary', $vacancy->salary ?? '') }}"> <br>
            @error('salary')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p class="font-black-18px">Подработка</p>
            @foreach($categories as $category)
                @if($category->category_type=='Подработка')
                    <label for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(
                    in_array(
                       $category->id,
                       old('categories', isset($vacancy) ? $vacancy->categories->pluck('id')->toArray() : [])
                    ))>{{$category->category_name}}</label> <br>
                @endif
            @endforeach

            <p class="font-black-18px">Отрасль</p>
            @foreach($categories as $category)
                @if($category->category_type=='Отрасль')
                    <label for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(
                    in_array(
                       $category->id,
                       old('categories', isset($vacancy) ? $vacancy->categories->pluck('id')->toArray() : [])
                    ))>{{$category->category_name}}</label> <br>
                @endif
            @endforeach

            <p class="font-black-18px">Образование</p>
            @foreach($categories as $category)
                @if($category->category_type=='Образование')
                    <label for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(
                    in_array(
                       $category->id,
                       old('categories', isset($vacancy) ? $vacancy->categories->pluck('id')->toArray() : [])
                    ))>{{$category->category_name}}</label> <br>
                @endif
            @endforeach

            <p class="font-black-18px">Опыт работы</p>
            @foreach($categories as $category)
                @if($category->category_type=='Опыт работы')
                    <label for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(
                    in_array(
                       $category->id,
                       old('categories', isset($vacancy) ? $vacancy->categories->pluck('id')->toArray() : [])
                    ))>{{$category->category_name}}</label> <br>
                @endif
            @endforeach

            <p class="font-black-18px">Формат работы</p>
            @foreach($categories as $category)
                @if($category->category_type=='Формат работы')
                    <label for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}">{{$category->category_name}}</label> <br>
                @endif
            @endforeach

            <p class="font-black-18px">График работы</p>
            @foreach($categories as $category)
                @if($category->category_type=='График работы')
                    <label for="{{$category->id}}"><input type="checkbox" class="checkbox-input" name="categories[]" value="{{$category->id}}" @checked(
                    in_array(
                       $category->id,
                       old('categories', isset($vacancy) ? $vacancy->categories->pluck('id')->toArray() : [])
                    ))>{{$category->category_name}}</label> <br>
                @endif
            @endforeach

            <p class="font-black-18px">Расскажите о вакансии</p>
            <textarea type="text" class="font-black-16px" name="description">{{ old('description', $vacancy->description ?? '') }}</textarea>
            @error('description')
                <em class="font-red-small">{{$message}}</em>
            @enderror
            <br>
            <button type="submit" class="btn-update font-white-17px" style="margin-top: 50px">Сохранить</button>
        </form>
    </div>
@endsection