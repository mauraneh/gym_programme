<?php
    switch ($action){
        case 'listeRessource':{
            require_once "includes/core/models/daoRessources.php";

            $idExo = $_GET['id'] ?? 0;
            $lesRessources = getAllRessourcesByExo($idExo);

            $lesInfosAEnvoyer = array();
            foreach ($lesRessources as $unRessource){
                $lesInfosAEnvoyer[] = array(
                    'nom' => $unRessource->getNom(),
                    'contenu' => $unRessource->getContenu(),
                    'url' => $unRessource->getUrl()
                );
            }

            require_once "includes/core/views/view_api.phtml";
            break;
        }

        case 'getRessource':{
            require_once "includes/core/models/daoExercice.php";
            require_once "includes/core/models/daoRessources.php";

            $idExo = $_GET['id'] ?? 0;

            $unRessource = getRessourceById($idExo);

                $lesInfosAEnvoyer[] = array(
                    'nom' => $unRessource->getNom(),
                    'contenu' => $unRessource->getContenu(),
                    'url' => $unRessource->getUrl()
                );

            require_once "includes/core/views/view_api.phtml";
            break;
        }

        default:{

        }
    }