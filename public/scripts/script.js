

//--------------------- GRAPH POIDS   -------------------------

// SETUP BLOCK
const data = {
    labels: dates,
    datasets: [{
        data: poids,
        label: 'Poids',
        fill: false,
        borderColor: ['turquoise'],
        tension: 0.4,
        borderWidth: 4
    }]
};

// CONFIG BLOCK
const config = {
    type: 'line',
    data,
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Ta courbe de poids'
            },
        },
        interaction: {
            intersect: false,
        },
        scales: {
            x: {
                display: true,
                title: {
                    display: true,
                    text: 'Date'
                }
            },
            y: {
                display: true,
                title: {
                    display: true,
                    text: 'Poids'
                },
            }
        }
    },
};
// RENDER BLOCK
const graphCanvas = new Chart(
    document.getElementById('graphCanvas').getContext('2d') ,
    config
);

//---------------------GUIDE PROGRAMME -------------------------
document.querySelector('#exercices').addEventListener('change', function(){
    let id = document.querySelector('#exercices').selectedOptions[0].value;
    console.log(id);
    fetch('index.php?page=api&action=listeRessource&id=' + id)
        .then(function (response){
            document.querySelector('#infosExercices').innerHTML = '';
            response.json().then(function (data){

                let titreVideo = document.createElement('h3');
                titreVideo.innerText = data[0].nom;
                document.querySelector('#infosExercices').appendChild(titreVideo);

//TODO: faire un foreach data qui parcours toutes les ressources et en focntion du type de ressource faire un if en

                let video = document.createElement("iframe");
                // récupérer l'URL de la vidéo à partir de la base de données
                let urlVideo = data[0].url;
                // assigner l'URL à la propriété src de l'élément iframe
                video.setAttribute('src', urlVideo);
                document.querySelector('#infosExercices').appendChild(video);

            })
        })
});
