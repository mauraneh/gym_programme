<?php
    require_once 'includes/core/models/bdd.php';
    require_once 'includes/core/models/Gym_session.php';


    function getAllSessions(): array
    {
        $conn = getConnexion();

        $SQLQuery = "SELECT s.id, s.libelle
			FROM session s";

        $SQLStmt = $conn->prepare($SQLQuery);
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

