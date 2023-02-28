<?php
    require_once 'includes/core/models/daoClient.php';
    require_once 'includes/core/models/daoGenre.php';
    require_once 'includes/core/models/daoProgramme.php';
    require_once 'includes/core/models/daoUser.php';

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
                        new User($_POST['login'], password_hash($_POST['mdp'], PASSWORD_DEFAULT))
                    );
                    $mdpConfirm = $_POST['mdpConfirm'];

                    if(userExists($_POST['login'])){
                        $messageLog= 'Ce login existe déjà';
                    }else if(strcmp($_POST['mdp'], $mdpConfirm) !== 0) {
                        $messageMdp= 'Le mot de pass ne correspond pas';
                    }else{
                        if (insertClient($unClient)){
                            header('Location: index.php?page=user&action=login');
                        }else{
                            $message = "Erreur d'enregistrement !";
                        }
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