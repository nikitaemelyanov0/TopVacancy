<header class="header-second">
    <div class="header-inner wrapper">
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/logo.png')}}" alt="" class="logo-big"></a>
        </div>
        <div class="header-links header-links-second" style="width: 400px">
            <div class="location">
                <img src="{{asset('assets/images/location.png')}}" alt="">
                <p class="font-white-16px" style="text-decoration: underline;">Челябинск</p>
            </div>
            <div class="header-btns header-btns-second">
                @if($currentuser->role =='applicant')
                    @if($currentuser->resume)
                        <a href="{{route('resume.index', $currentuser->resume->id)}}"><button class="btn-blue font-white-16px btn-create-vacancy show hover">Ваше резюме</button></a>
                    @else
                        <a href="{{route('create_resume.index')}}"><button class="btn-blue font-white-16px btn-create-vacancy show hover">Создать резюме</button></a>
                    @endif
                @else
                    <a href="{{route('create_vacancy.index')}}"><button class="btn-blue font-white-16px btn-create-vacancy show hover">Создать вакансию</button></a>
                @endif
                <img src="{{asset('assets/images/burger.png')}}" alt="" class="burger">
                <div class="burger-window hide">
                    <ul>
                        @if($currentuser->role =='employer')
                            <a href="{{route('application.index')}}"><li class="font-black-17px">Ваши вакансии и отклики</li></a>
                        @else
                            @if($currentuser->resume)
                                <a href="{{route('resume.index', $currentuser->resume->id)}}"><li class="font-black-17px">Ваше резюме</li></a>
                            @else
                                <a href="{{route('create_resume.index')}}"><li class="font-black-17px">Создать резюме</li></a>
                            @endif
                        @endif
                        <a href="{{route('logout')}}"><li class="font-blue-17px hover">Выйти из аккаунта</li></a>
                        <a href="{{route('delete_user')}}"><li class="font-red-17px hover">Удалить аккаунт</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>