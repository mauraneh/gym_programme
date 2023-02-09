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
                        date_create($_POST['dateNaissance']),
                        intval($_POST['poidsRef']),
                        intval($_POST['poidsVise']),
                        getGenreById($_POST['genre']),
                        intval($_POST['taille']),
                        $_POST['email'],
                        $_POST['mdp'],
                        $_POST['ville']
                    );
                }


                $lesGenres = getAllGenre();
                require_once "includes/core/views/form_client.phtml";
                break;
            }
        case 'resetmdp':{
            require_once "includes/core/views/reset_mdp.phtml";
            break;
        }
    }