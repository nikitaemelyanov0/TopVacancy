<footer>
    <div class="footer-inner wrapper">
        <img src="{{asset('assets//images/logo.png')}}" alt="">
        <div class="footer-links">
            <ul>
                <li class="font-white-19px">Соискателям</li>
                <a href="{{route('create_resume.index')}}"><li class="font-white-16px">Создать резюме</li></a>
                <a href="{{route('search_vacancy')}}"><li class="font-white-16px">Вакансии</li></a>
            </ul>
            <ul>
                <li class="font-white-19px">Работодателям</li>
                <a href="{{route('create_vacancy.index')}}"><li class="font-white-16px">Создать вакансию</li></a>
            </ul>
            <ul>
                <li class="font-white-19px">Контакты</li>
                <li class="footer-contacts">
                    <a href="#"><img src="{{asset('assets/images/telegram.png')}}" alt=""></a>
                    <a href="#"><img src="{{asset('assets/images/vk.png')}}" alt=""></a>
                    <a href="#"><img src="{{asset('assets/images/facebook.png')}}" alt=""></a>
                </li>
            </ul>
        </div>
    </div>
</footer>