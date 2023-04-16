//----------------------------MENU BURGER ----------------------
const navbarBurger = document.querySelector('.navbar__button');
const navbarMenu = document.querySelector('.navbar__menu');

navbarBurger.addEventListener('click', () => {
    navbarMenu.classList.toggle('display');
});

//----------------------------MENU USER RAT ----------------------
const btnMenu = document.querySelector('.userProfil__btn');
const menuUser = document.querySelector('.userProfil__menu');

btnMenu.addEventListener('click', () => {
    menuUser.classList.toggle('hide');
});

document.querySelector('#closeBtn').addEventListener('click', () => {
    menuUser.classList.toggle('hide');
});