<?php
    require_once 'includes/core/models/daoPoids.php';
    require_once 'includes/core/models/daoClient.php';
    require_once 'includes/core/models/daoProgramme.php';
    require_once 'includes/core/models/daoUser.php';


    $unClient = getClientByLogin($_SESSION['login']);

    switch ($action) {
        case 'add':
            {
                if(empty($_POST)){
                    $unPoids = new Releve_poids();
                    $unPoids->setClient($unClient);
                }else {
                    $unPoids = new Releve_poids(
                        date_create($_POST['dateAjout']),
                        floatval($_POST['valeur']),
                        $unClient
                    );

                    if (insertPoids($unPoids)) {
                        header('Location: index.php?page=poids');

                    } else {
                        $message = "Erreur d'enregistrement !";
                    }
                }

                require_once "includes/core/views/form_poids.phtml";
                break;
            }
        default :
            {
                $lesPoids = getAllPoids($unClient->getId());

                $unPoids = getLastPoids($unClient->getId());

                require_once 'includes/core/views/poids.phtml';
                break;
            }
    }