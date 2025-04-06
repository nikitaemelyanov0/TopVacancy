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

let burger = document.querySelector('.burger');
let burgerWindow = document.querySelector('.burger-window');

burger.addEventListener("click", ()=> {burgerWindow.classList.toggle('hide')})