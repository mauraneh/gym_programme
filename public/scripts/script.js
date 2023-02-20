
//---------------------------- AFFICHER MDP ----------------------
/*function show(){
    let p = document.querySelector('#mdp');
    p.setAttribute('type', 'text');
};
// Hide pwd
function hide(){
    let p = document.querySelector('#mdp');
    p.setAttribute('type' , 'password');
}
let pwdshown = 0;
let eyeBtn = document.querySelector('#eye');

 eyeBtn.addEventListener('click', function(){
    if(pwdshown === 0){
        pwdshown = 1;
        show();
    } else{
        pwdshown = 0;
        hide();
    }
}, false);

//----------------------------MENU BURGER ----------------------
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
}*/

//--------------------- GRAPH POIDS   -------------------------

// SETUP BLOCK
const data = {
    labels: dates,
    datasets: [{
        data: poids,
        backgroundColor: ["lightblue", "lightgreen", "violet"]
    }]
};

// CONFIG BLOCK
const config = {
    type: 'line',
    data,
    options: {
        elements: {
            point: {
                pointBorderColor: '#333'
            }
        }
    }
};
// RENDER BLOCK
const graphCanvas = new Chart(
    document.getElementById('graphCanvas').getContext('2d') ,
    config
);

//--------------------- FETCH POIDS  -------------------------


