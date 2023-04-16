document.querySelector('select').addEventListener('change', function(){
    let id = document.querySelector('select').selectedOptions[0].value;
    console.log(id);
    fetch('index.php?page=api&action=listeRessource&id=' + id)
        .then(function (response){
            document.querySelector('#infosExercices').innerHTML = '';
            response.json().then(function (data){

                let titreVideo = document.createElement('h3');
                titreVideo.innerText = data[0].nom;
                document.querySelector('#infosExercices').appendChild(titreVideo);

//TODO: faire un foreach data qui parcours toutes les ressources et en fonction du type de ressource faire un if

                let video = document.createElement("iframe");
                // récupérer l'URL de la vidéo à partir de la base de données
                let urlVideo = data[0].url;
                // assigner l'URL à la propriété src de l'élément iframe
                video.setAttribute('src', urlVideo);
                document.querySelector('#infosExercices').appendChild(video);

            })
        })
});