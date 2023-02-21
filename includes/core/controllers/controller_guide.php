<?php
    require_once 'includes/core/models/daoExercice.php';

    $lesExercices = getListeExo();


    require_once 'includes/core/views/guide_exercices.phtml';