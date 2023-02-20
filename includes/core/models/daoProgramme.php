<?php
    require_once 'includes/core/models/bdd.php';
    require_once 'includes/core/models/Programme.php';

    function getAllProgrammes(): array{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle, frequence, description
			FROM programme";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $listeProgrammes = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){

            $unProgramme = new Programme($SQLRow['libelle'], $SQLRow['frequence'], $SQLRow['description']);

            $unProgramme->setId($SQLRow['id']);

            $listeProgrammes[] = $unProgramme;

        }

        $SQLStmt->closeCursor();

        return $listeProgrammes;
    }
    function getProgById(int $id): Programme{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle, frequence, description
			FROM programme
			WHERE id = :id";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $unProgramme = new Programme($SQLRow['libelle'], $SQLRow['frequence'], $SQLRow['description']);
        $unProgramme->setId($SQLRow['id']);

        $SQLStmt->closeCursor();

        return $unProgramme;
    }