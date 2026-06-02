@extends('layout')

@section('title', 'Создание отзыва')

@section('content')
    <div class="create-resume-vacancy container">
        <form action="" method="POST" enctype="multipart/form-data" class="font-light-16px">
            @csrf
            @if(isset($review->id))
                @method('PUT')  
            @endif

            <h1 class="font-black-23px" style="margin-top: 40px; margin-bottom: 30px;">{{'Ваш отзыв на '.$company->company_name}}</h1>

            <div class="rating" id="rating">
                <input type="hidden" name="grade" id="rating-value" value="0">
                <span class="star" data-index="1"></span>
                <span class="star" data-index="2"></span>
                <span class="star" data-index="3"></span>
                <span class="star" data-index="4"></span>
                <span class="star" data-index="5"></span>
            </div>

            <p>Ваш отзыв</p>
            <textarea type="text" class="font-black-16px" name="message">{{ old('message', $review->message ?? '') }}</textarea>
            @error('message')
            <em class="font-red-small">{{$message}}</em>
            @enderror
            
            <button type="submit" class="btn-update font-white-17px" style="margin-top: 50px">Сохранить</button>
        </form>
    </div>
@endsection