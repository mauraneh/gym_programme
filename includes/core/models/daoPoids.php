<?php
    require_once 'includes/core/models/bdd.php';
    require_once 'includes/core/models/Releve_poids.php';
    require_once "includes/core/models/Client.php";

    function getAllPoids(int $idClient): array{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, dateAjout, valeur
        FROM releve_poids
        WHERE id_Client = :idClient";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':idClient', $idClient, PDO::PARAM_INT);
        $SQLStmt->execute();

        $listePoids = array();
            while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
                $unPoids = new Releve_poids(date_create($SQLRow['dateAjout']), floatval($SQLRow['valeur']));

                $unPoids->setId($SQLRow['id']);

                $listePoids[] = $unPoids;
            }

            $SQLStmt->closeCursor();

            return $listePoids;
    }

    function insertPoids(Releve_poids $unPoids):bool{
            $conn = getConnexion();

            $SQLQuery= "INSERT INTO Releve_poids (dateAjout, valeur, id_client) VALUES (:dateAjout, :valeur, :id_client)";

            $SQLStmt = $conn->prepare($SQLQuery);
            $SQLStmt->bindValue(':dateAjout', $unPoids->getDateAjout()->format('Y-m-d'), PDO::PARAM_STR);
            $SQLStmt->bindValue(':valeur', $unPoids->getValeur(), PDO::PARAM_INT);
            $SQLStmt->bindValue(':id_client', $unPoids->getClient()->getId(), PDO::PARAM_INT);

            if (!$SQLStmt->execute()){
                return false;
            }else{
                return true;
            }
    }

    function getLastPoids(int $idClient): Releve_poids{
        $conn = getConnexion();

        $SQLQuery= "
        SELECT id, dateAjout, valeur
        FROM Releve_poids
        WHERE id_client = :idClient
        ORDER BY dateAjout
        DESC limit 1";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':idClient', $idClient, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        if($SQLStmt->rowCount() == 0){
            $lastPoids = new Releve_poids();
        }else{
            $lastPoids = new Releve_poids(date_create($SQLRow['dateAjout']), floatval($SQLRow['valeur']));
            $lastPoids->setId($SQLRow['id']);
        }

        return $lastPoids;
    }
    function deletePoids(int $clientPoids): bool{
        $conn = getConnexion();

        $SQLQuery = "DELETE FROM Releve_poids WHERE id_client = :id";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $clientPoids, PDO::PARAM_INT);

        if (!$SQLStmt->execute()){
            return false;
        }else{
            return true;
        }
    }