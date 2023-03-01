<?php
    require_once 'includes/core/models/daoClient.php';
    require_once 'includes/core/models/daoPoids.php';
    require_once 'includes/core/models/daoProgramme.php';
    require_once 'includes/core/models/daoUser.php';
    require_once 'includes/core/models/daoPoids.php';


    $unClient = getClientByLogin($_SESSION['login']);

    $lesClients = getAllClient();

    $lesPoids = getAllPoids($unClient->getId());

    $unPoids = getLastPoids($unClient->getId());

    require_once("includes/core/views/accueil.phtml");

