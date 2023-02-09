<?php

    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/Client.php";

    function getAllClient(): array{
        $conn = getConnexion();

        $SQLQuery = "SELECT c.id, c.nom, c.prenom, c.date_naissance, c.poids_ref, 
       c.poids_vise, c.taille, c.email, c.mdp, c.telephone, c.ville,
				gen.libelle_court, gen.libelle_long
			FROM client c INNER JOIN genre gen ON c.id_genre = gen.id;";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $listeClients = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){

            $unClient = new Client($SQLRow['nom'], $SQLRow['prenom'], $SQLRow['email'], $SQLRow['mdp'], $SQLRow['ville'], date_create($SQLRow['date_naissance']), $SQLRow['poids_ref'],
                $SQLRow['poids_vise'], $SQLRow['taille'], $SQLRow['telephone'], new Genre($SQLRow['libelle_court'], $SQLRow['libelle_long']));

            $unClient->setId($SQLRow['id']);

            $listeClients[] = $unClient;

            // Pour seconde solution possible
            //$listePersonnes[] = new Personne() .....
            //$listePersonnes[count($listePersonnes) - 1]->setId();

        }

        $SQLStmt->closeCursor();

        return $listeClients;
    }