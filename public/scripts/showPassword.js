
//---------------------------- AFFICHER MDP ----------------------
function show(){
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
