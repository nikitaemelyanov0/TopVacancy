<header>
    <div class="header-inner wrapper">
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
        </div>
        <div class="header-links">
            <div class="location">
                <img src="{{asset('assets/images/location.png')}}" alt="">
                <p class="font-white-16px" style="text-decoration: underline;">Челябинск</p>
            </div>
            <div class="header-btns">
                <a href="{{route('login')}}"><button class="btn-blue font-white-16px btn-create-vacancy">Создать вакансию</button></a>
                <a href="{{route('login')}}"><button class="btn-blue font-white-16px btn-create-resume">Создать резюме</button></a>
                <a href="{{route('login')}}" style="text-align: center"><button class="btn-white font-blue-16px">Войти</button></a>
            </div>
        </div>
    </div>
</header>