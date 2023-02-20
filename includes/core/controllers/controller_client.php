<?php
    require_once 'includes/core/models/daoClient.php';
    require_once 'includes/core/models/daoGenre.php';
    require_once 'includes/core/models/daoProgramme.php';

    switch ($action) {
        case 'add':{

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
                        header('Location: index.php?page=user&action=login');
                    }else{
                        $message = "Erreur d'enregistrement !";
                    }
                }
                $lesGenres = getAllGenre();

                require_once "includes/core/views/form_client.phtml";
                break;
            }
        case 'setProg':{

            $idProg = $_GET['id'] ?? 0;

            $unClient = getClientByLogin($_SESSION['login']);

            $unProgramme = getProgById($idProg);

            $unClient->setProgramme($unProgramme);

            updateClient($unClient);

            header('Location: ?page=accueil');
            break;
        }
    }