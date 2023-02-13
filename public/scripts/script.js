const burger = document.getElementById("burgerHide");
const menu = document.getElementById("menuHide");
const btnBurger = document.getElementById("btnBurger");
const btnMenu = document.getElementById("btnMenu");
console.log(burger);
// ecoutes

btnBurger.addEventListener("click", hideBurger);
btnMenu.addEventListener("click", hideMenu);

// functions
function hideBurger() {
    burger.classList.toggle("burgerHide");
}

function hideMenu() {
    menu.classList.toggle("menuHide");
}