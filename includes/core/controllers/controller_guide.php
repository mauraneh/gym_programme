<?php

                require_once 'includes/core/models/daoExercice.php';
                require_once 'includes/core/models/daoRessources.php';

                $lesExercices = getListeExo();

                foreach ($lesExercices as $unExercice) {
                    $unExercice->setRessources(getAllRessourcesByExo($unExercice->getId()));
                }

                require_once 'includes/core/views/guide_exercices.phtml';