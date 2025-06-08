@extends('layout')

@section('title', 'Отклики')

@section('content')
    <div class="admin wrapper" style="min-height: 80vh">
        <table style="width: 700px; border-spacing: 30px;">
            <thead>
                <tr class="font-black-19px">
                    <th>имя</th>
                    <th>email</th>
                    <th>роль</th>
                    <th>вакансия/резюме</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="font-light-16px">
                        <th>{{$user->user_name}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->role}}</th>
                        @if($user->resume)
                            <th><a href="{{route('resume.index', $user->resume->id)}}">{{$user->resume->profession}}</a></th>
                        @endif
                        @if($user->vacancies)
                            <th>
                                @foreach($user->vacancies as $vacancy)
                                    <a href="{{route('vacancy.index', $vacancy->id)}}">{{$vacancy->position}}</a> <br>
                                @endforeach
                            </th>
                        @endif
                    </tr>
                @endforeach
            </tbody>   
        </table>
    </div>
@endsection