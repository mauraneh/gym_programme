<?php
    require_once 'includes/core/models/bdd.php';
    require_once 'includes/core/models/Ressource.php';

    function getAllRessourcesByExo(int $idExercices): array
    {
        $conn = getConnexion();

        $SQLQuery = "SELECT r.id, r.nom, r.contenu, r.url
			FROM ressource r
            INNER JOIN exercices exo ON exo.id = r.id_exercices
			WHERE id_exercices = :idExercices";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':idExercices', $idExercices, PDO::PARAM_INT);
        $SQLStmt->execute();

        $lesRessources = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)) {

            $uneRessource = new Ressource($SQLRow['nom'], $SQLRow['contenu'], $SQLRow['url']);

            $uneRessource->setId($SQLRow['id']);

            $lesRessources[] = $uneRessource;

        }

        $SQLStmt->closeCursor();

        return $lesRessources;
    }
