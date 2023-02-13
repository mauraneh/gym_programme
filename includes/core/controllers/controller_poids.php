<?php
    require_once "includes/core/views/poids.phtml";

    switch ($action) {
        case 'add':
            {
                require_once 'includes/core/models/daoRelevePoids.php';
                require_once 'includes/core/models/daoClient.php';

                require_once "includes/core/views/form_poids.phtml";
                break;
            }
    }