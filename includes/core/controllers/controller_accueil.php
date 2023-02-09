<?php
    require_once "includes/core/models/Client.php";
    require_once "includes/core/models/Genre.php";
    require_once 'includes/core/models/daoClient.php';
    require_once 'includes/core/models/daoGenre.php';



    $lesClients = getAllClient();
    $lesGenres = getAllGenre();

    require_once("includes/core/views/accueil.phtml");

