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

let menuUser = document.querySelector(".userProfil");

let isDragging = false;
let offset = { x: 0, y: 0 };

menuUser.addEventListener('mousedown', function(e) {
    isDragging = true;
    offset.x = e.offsetX;
    offset.y = e.offsetY;
});

menuUser.addEventListener('mousemove', function(e) {
    if (isDragging) {
        menuUser.style.left = (e.pageX - offset.x) + 'px';
        menuUser.style.top = (e.pageY - offset.y) + 'px';
    }
});

menuUser.addEventListener('mouseup', function(e) {
    isDragging = false;
});