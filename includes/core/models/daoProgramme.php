<?php

    require_once 'includes/core/models/Programme.php';
    require_once 'includes/core/models/bdd.php';

    function getAllProgrammes(): array{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle, frequence
			FROM programme";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $listeProgrammes = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){

            $unProgramme = new Programme($SQLRow['libelle'], $SQLRow['frequence']);

            $unProgramme->setId($SQLRow['id']);

            $listeProgrammes[] = $unProgramme;

            // Pour seconde solution possible
            //$listePersonnes[] = new Personne() .....
            //$listePersonnes[count($listePersonnes) - 1]->setId();

        }

        $SQLStmt->closeCursor();

        return $listeProgrammes;
    }
    function getProgById(int $id): Genre{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle, frequence 
			FROM genre
			WHERE id = :id";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $unProgramme = new Genre($SQLRow['libelle'], $SQLRow['frequence']);
        $unProgramme->setId($SQLRow['id']);

        $SQLStmt->closeCursor();

        return $unProgramme;
    }