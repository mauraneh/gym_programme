<?php
require_once 'includes/core/models/Gym_session.php';

    switch ($action) {
        case 'add':
            {
                require_once 'includes/core/models/daoProgramme.php';
                require_once 'includes/core/models/daoSession.php';
                require_once 'includes/core/models/daoExercice.php';
                require_once 'includes/core/models/daoJours.php';

                $lesJours = getAllJours();
                $lesSessions = getAllSessions();

                require_once "includes/core/views/form_programme.phtml";
                break;
            }

    }