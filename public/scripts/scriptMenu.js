//----------------------------MENU BURGER ----------------------
const navbarBurger = document.querySelector('.navbar__burger');
const navbarMenu = document.querySelector('.navbar__menu');
const navbarCross = document.querySelector('.nav__cross');

navbarBurger.addEventListener('click', () => {
    navbarButton.classList.toggle('display');
    navbarMenu.classList.toggle('appear');

});

navbarCross.addEventListener('click', () => {
    navbarButton.classList.toggle('appear');
    navbarMenu.classList.toggle('display');
});