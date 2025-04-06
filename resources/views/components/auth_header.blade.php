<header>
    <div class="header-inner wrapper">
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
        </div>
        <div class="header-links" style="width: 400px">
            <div class="location">
                <img src="{{asset('assets/images/location.png')}}" alt="">
                <p class="font-white-16px" style="text-decoration: underline;">Челябинск</p>
            </div>
            <div class="header-btns">
                @if($currentuser->role =='applicant')
                    <a href="{{route('create_resume')}}"><button class="btn-blue font-white-16px btn-create-vacancy">Создать резюме</button></a>
                @else
                    <a href="{{route('create_vacancy')}}"><button class="btn-blue font-white-16px btn-create-vacancy">Создать вакансию</button></a>
                @endif
                <img src="{{asset('assets/images/burger.png')}}" alt="" class="burger">
                <div class="burger-window hide">
                    <ul>
                        @if($currentuser->role =='applicant')
                            <li class="font-black-17px">Ваше резюме</li>
                        @else
                            <li class="font-black-17px">Ваши вакансии и отклики</li>
                        @endif
                        <a href="{{route('logout')}}"><li class="font-blue-17px">Выйти из аккаунта</li></a>
                        <a href="{{route('delete_user')}}"><li class="font-red-17px">Удалить аккаунт</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>