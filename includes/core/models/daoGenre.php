<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/Genre.php";

    function getAllGenre(): array{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle_court, libelle_long 
			FROM genre";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();
                   
        $listeGenres = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
            $unGenre = new Genre($SQLRow['libelle_court'], $SQLRow['libelle_long']);

            $unGenre->setId($SQLRow['id']);

            $listeGenres[] = $unGenre;

        }

        $SQLStmt->closeCursor();

        return $listeGenres;
    }

    function getGenreById(int $id): Genre{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle_court, libelle_long 
			FROM genre
			WHERE id = :id";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $unGenre = new Genre($SQLRow['libelle_court'], $SQLRow['libelle_long']);
        $unGenre->setId($SQLRow['id']);

        $SQLStmt->closeCursor();

        return $unGenre;
    }
