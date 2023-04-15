
//---------------------------- AFFICHER MDP ----------------------
// Modifie le type de l'élément de saisie de mot de passe en text
function show(){
    let p = document.querySelector('#mdp');
    p.setAttribute('type', 'text'); // Modifie en text
};

// Modifie le type de l'élément de saisie de mot de passe en password
function hide(){
    let p = document.querySelector('#mdp');
    p.setAttribute('type' , 'password'); // Modifie en password
}

let pwdshown = 0; // Définit une variable pour suivre si le mot de passe est affiché ou caché (0 pour caché, 1 pour affiché)
let eyeBtn = document.querySelector('#eye');

// Ajoute un écouteur d'événements pour le clic sur le bouton 'eye'
eyeBtn.addEventListener('click', function(){
    if(pwdshown === 0){ // Si le mot de passe est caché
        pwdshown = 1; // le mot de passe est maintenant affiché
        show(); // affiche le mot de passe
    } else{ // Si le mot de passe est affiché
        pwdshown = 0; // le mot de passe est maintenant caché
        hide(); // cache le mot de passe
    }
}, false);

