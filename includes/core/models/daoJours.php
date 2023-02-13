<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/Jours.php";

    function getAllJours(): array{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle
			FROM jours";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $listeJours = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
            $unJour = new Jours($SQLRow['libelle']);

            $unJour->setId($SQLRow['id']);

            $listeJours[] = $unJour;

        }

        $SQLStmt->closeCursor();

        return $listeJours;
    }

    function getJoursById(int $id): Jours{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle
			FROM jours
			WHERE id = :id";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $unJour = new Jours($SQLRow['libelle_long']);
        $unJour->setId($SQLRow['id']);
        $SQLStmt->closeCursor();

        return $unJour;
    }
