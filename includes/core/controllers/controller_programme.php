<?php
    require_once 'includes/core/views/programme.phtml';
    require_once 'includes/core/models/Gym_session.php';

    switch ($action) {
        case 'add':
            {
                require_once 'includes/core/models/daoProgramme.php';
                require_once 'includes/core/models/daoSession.php';
                require_once 'includes/core/models/daoExercice.php';
                require_once 'includes/core/models/daoJours.php';

                if (empty($_POST)) {
                    $unProgramme = new Programme();
                } else {
                    $unProgramme = new Programme(
                        $_POST['id'],
                        $_POST['libelle'],
                        $_POST['frequence']
                    );
                }
                $lesJours = getAllJours();
                $lesSessions = getAllSessions();
                $lesProgrammes = getallProgrammes();

                require_once "includes/core/views/form_programme.phtml";
                break;
            }
    }
