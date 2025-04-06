<footer>
    <div class="footer-inner wrapper">
        <img src="{{asset('assets//images/logo.png')}}" alt="">
        <div class="footer-links">
            <ul>
                <li class="font-white-19px">Соискателям</li>
                <a href="{{route('create_resume')}}"><li class="font-white-16px">Создать резюме</li></a>
                <a href="{{route('search_vacancy')}}"><li class="font-white-16px">Вакансии</li></a>
            </ul>
            <ul>
                <li class="font-white-19px">Работодателям</li>
                <a href="{{route('create_vacancy')}}"><li class="font-white-16px">Создать вакансию</li></a>
            </ul>
            <ul>
                <li class="font-white-19px">Контакты</li>
                <li class="footer-contacts">
                    <img src="{{asset('assets/images/telegram.png')}}" alt="">
                    <img src="{{asset('assets/images/vk.png')}}" alt="">
                    <img src="{{asset('assets/images/facebook.png')}}" alt="">
                </li>
            </ul>
        </div>
    </div>
</footer>