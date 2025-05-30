try {
    let btnWork = document.querySelector('.btn-work');
    let btnEmployee = document.querySelector('.btn-employee');
    let role = document.querySelector('.role');

    btnWork.addEventListener("click", () => {
        btnWork.classList.toggle('role-choose')
        btnEmployee.classList.remove('role-choose')
        role.value = 'applicant'
    })
    btnEmployee.addEventListener("click", () => {
        btnEmployee.classList.toggle('role-choose')
        btnWork.classList.remove('role-choose')
        role.value = 'employer'
    })
} catch(error) {
    console.log(error);
}

try {
    let burger = document.querySelector('.burger');
    let burgerWindow = document.querySelector('.burger-window');
    burger.addEventListener("click", ()=> {burgerWindow.classList.toggle('hide')})
} catch(error) {
    console.log(error);
}

try {
    let btnContactsSmall = document.querySelectorAll('.btn-contacts-small');
    let contacts = document.querySelectorAll('.contacts');
    let cross = document.querySelectorAll('.cross');
    let btnContacts = document.querySelectorAll('.btn-contacts');

    btnContactsSmall.forEach((item) => {
        let key = Object.keys(btnContactsSmall).find(k => btnContactsSmall[k] === item);
        item.addEventListener("click", ()=> {
            contacts[key].classList.remove('hide')
            document.body.classList.add('scrolllock');
        })
    })
    
    btnContacts.forEach((item) => {
        let key = Object.keys(btnContacts).find(k => btnContacts[k] === item);
        item.addEventListener("click", ()=> {
            contacts[key].classList.remove('hide')
            document.body.classList.add('scrolllock');
        })
    })
    
    cross.forEach((item) => {
        let key = Object.keys(cross).find(k => cross[k] === item);
        item.addEventListener("click", ()=> {
            contacts[key].classList.add('hide')
            document.body.classList.remove('scrolllock');
        })
    })
}catch(error) {
    console.log(error);
}

try{
    let showIndustries = document.querySelector('.show-industries')
    let industriesHide = document.querySelector('.industries-hide')

    showIndustries.addEventListener('click', ()=> {
        industriesHide.style="height: auto"
        showIndustries.classList.add('hide')
    })
}catch(error) {
    console.log(error);
}

try{
    let hideFilters = document.querySelector('.hide-filters')
    let searchVacancyFilter = document.querySelector('.search-vacancy-filter')

    hideFilters.addEventListener('click', ()=> {
        if (searchVacancyFilter.classList.contains('hide')) {
            hideFilters.textContent = 'Скрыть фильтры';
        } else {
            hideFilters.textContent = 'Показать фильтры';
        }
        searchVacancyFilter.classList.toggle('hide')
    })
}catch(error) {
    console.log(error);
}

try{
    document.querySelector('.input-file').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(event) {
                const preview = document.querySelector('.img-preview');
                preview.src = event.target.result;
                document.querySelector('.continer-preview').style.display = 'block';
            }

            reader.readAsDataURL(file);
        }
    })
}catch(error) {
    console.log(error);
}