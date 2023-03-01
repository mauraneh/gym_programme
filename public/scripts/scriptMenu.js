//----------------------------MENU BURGER ----------------------
const navbarBurger = document.querySelector('.navbar__button');
const navbarMenu = document.querySelector('.navbar__menu');

navbarBurger.addEventListener('click', () => {
    navbarMenu.classList.toggle('display');
});

//----------------------------MENU USER RAT ----------------------
const btnRat = document.querySelector('.userProfil__btn');
const menuRat = document.querySelector('.userProfil__menu');

btnRat.addEventListener('click', () => {
    menuRat.classList.toggle('hide');
});