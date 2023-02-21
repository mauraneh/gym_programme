<?php
    require_once 'includes/core/models/daoProgramme.php';
    require_once 'includes/core/models/daoSession.php';
    require_once 'includes/core/models/daoExercice.php';

    $lesProgrammes = getAllProgrammes();
    foreach ($lesProgrammes as $unProgramme){
        $unProgramme->setSessions(getAllSessions($unProgramme->getId()));
        foreach ($unProgramme->getSessions() as $uneSession){
            $uneSession->setExercices(getAllExercices($uneSession->getId()));
        }
    }

    require_once 'includes/core/views/programme.phtml';
