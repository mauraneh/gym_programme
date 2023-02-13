<?php

    switch ($action) {
        case 'add':{
            require_once "includes/core/models/Client.php";
            require_once "includes/core/models/Genre.php";
            require_once 'includes/core/models/daoClient.php';
            require_once 'includes/core/models/daoGenre.php';


                if(empty($_POST)){
                    $unClient = new Client();
                }else {
                    $unClient = new Client(
                        $_POST['nom'],
                        $_POST['prenom'],
                        $_POST['email'],
                        $_POST['ville'],
                        date_create($_POST['dateNaissance']),
                        intval($_POST['poidsRef']),
                        intval($_POST['poidsVise']),
                        intval($_POST['taille']),
                        $_POST['telephone'],
                        getGenreById($_POST['genre']),
                        new User($_POST['login'], $_POST['mdp'])
                    );

                    if (insertClient($unClient)){
                        header('Location: ?page=accueil');
                    }else{
                        $message = "Erreur d'enregistrement !";
                    }
                }
//var_dump($unClient);


                $lesGenres = getAllGenre();

                require_once "includes/core/views/form_client.phtml";
                break;
            }
        case 'resetmdp':{
            require_once "includes/core/views/reset_mdp.phtml";
            break;
        }
    }