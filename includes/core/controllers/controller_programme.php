<?php
    require_once 'includes/core/models/daoProgramme.php';

                $lesProgrammes = getAllProgrammes();

                require_once 'includes/core/views/programme.phtml';
