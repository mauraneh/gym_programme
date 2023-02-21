<?php
    require_once 'includes/core/models/bdd.php';
    require_once 'includes/core/models/Gymsession.php';
    require_once 'includes/core/models/Programme.php';


    function getAllSessions(int $idProgramme): array
    {
        $conn = getConnexion();

        $SQLQuery = "SELECT s.id, s.libelle
			FROM session s
			INNER JOIN contenir c ON c.id = s.id
			WHERE id_programme = :idProgramme";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':idProgramme', $idProgramme, PDO::PARAM_INT);
        $SQLStmt->execute();


        $listeSessions = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)) {
            $uneSession = new Gymsession($SQLRow['libelle']);

            $uneSession->setId($SQLRow['id']);

            $listeSessions[] = $uneSession;

        }

        $SQLStmt->closeCursor();

        return $listeSessions;
    }
    function getSessionById(int $id): Gymsession {
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle
			FROM session
			WHERE id = :id";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $uneSession = new Gymsession($SQLRow['libelle']);
        $uneSession->setId($SQLRow['id']);

        $SQLStmt->closeCursor();

        return $uneSession;
    }
