<?php
    require_once 'includes/core/models/bdd.php';
    require_once 'includes/core/models/Exercice.php';


    function getAllExercices(int $idSession): array
    {
        $conn = getConnexion();

        $SQLQuery = "SELECT e.id, e.nom_exo, e.nbre_rep, e.nbre_serie, e.pause
			FROM exercices e
            INNER JOIN composer c ON c.id_exercices = e.id
			WHERE id_session = :idSession";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':idSession', $idSession, PDO::PARAM_INT);
        $SQLStmt->execute();

        $listeExercices = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)) {

            $unExercice = new Exercice($SQLRow['nom_exo'], $SQLRow['nbre_rep'], $SQLRow['nbre_serie'], $SQLRow['pause']);

            $unExercice->setId($SQLRow['id']);

            $listeExercices[] = $unExercice;

        }

        $SQLStmt->closeCursor();

        return $listeExercices;
    }

    function getExoById(int $id): Exercice
    {
        $conn = getConnexion();

        $SQLQuery = "SELECT id, nom_exo, nbre_rep, nbre_serie, pause 
			FROM exercice
			WHERE id = :id";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $unExercice = new Exercice($SQLRow['nom_exo'], $SQLRow['nbre_rep'], $SQLRow['nbre_serie'], $SQLRow['pause']);
        $unExercice->setId($SQLRow['id']);

        $SQLStmt->closeCursor();

        return $unExercice;
    }

    function getListeExo(): array
    {
        $conn = getConnexion();

        $SQLQuery = "SELECT id, nom_exo, nbre_rep, nbre_serie, pause
			FROM exercices 
			ORDER BY nom_exo ASC";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $listeExercices = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)) {

            $unExercice = new Exercice($SQLRow['nom_exo'], $SQLRow['nbre_rep'], $SQLRow['nbre_serie'], $SQLRow['pause']);

            $unExercice->setId($SQLRow['id']);

            $listeExercices[] = $unExercice;

        }

        $SQLStmt->closeCursor();

        return $listeExercices;
    }