@extends('layout')

@section('title', 'Создание компании')

@section('content')
    <div class="create-resume-vacancy container">
        <form action="" method="POST" enctype="multipart/form-data" class="font-light-16px">
            @csrf
            @if(isset($company->id))
                @method('PUT')  
            @endif

            <p class="font-black-18px">Название компании</p>
            <input type="text" class="font-black-16px" name="company_name" value="{{ old('company_name', $company->company_name ?? '') }}"> <br>
            @error('company_name')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p class="font-black-18px">Email</p>
            <input type="email" class="font-black-16px" name="email" value="{{ old('email', $company->email ?? '') }}"> <br>
            @error('email')
                <em class="font-red-small">{{$message}}</em>
            @enderror
            
            <p class="font-black-18px">Номер телефона</p>
            <input type="text" class="font-black-16px" name="phone" value="{{ old('phone', $company->phone ?? '') }}"> <br>
            @error('phone')
                <em class="font-red-small">{{$message}}</em>
            @enderror

            <p class="font-black-18px">Логотип компании</p>
            <div class="img-continer">
                <div class="continer-preview">
                    <img class="img-preview" src="{{asset($company->logo)}}" alt="" style="height: 165px; width: 165px; object-fit: cover;">
                </div>
            </div>
            <input type="file" class="input-file" name="logo" value="{{ old('logo', $company->logo ?? '') }}"> <br>

            <p class="font-black-18px">Расскажите о вашей компании</p>
            <textarea type="text" class="font-black-16px" name="description">{{ old('description', $company->description ?? '') }}</textarea>
            @error('description')
                <em class="font-red-small">{{$message}}</em>
            @enderror
            <br>

            <p class="font-black-18px">Адрес работы</p>
            <input type="text" class="font-black-16px" name="address" value="{{ old('address', $company->address ?? '') }}"> <br>
            @error('address')
                <em class="font-red-small">{{$message}}</em>
            @enderror
            
            <button type="submit" class="btn-update font-white-17px" style="margin-top: 50px">Сохранить</button>
        </form>
    </div>
@endsection