<?php

    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/Client.php";

    function getAllClient(): array{
        $conn = getConnexion();

        $SQLQuery = "SELECT c.id, c.nom, c.prenom, c.date_naissance, c.poids_ref, 
       c.poids_vise, c.taille, c.email, c.telephone, c.ville,
				gen.libelle_court, gen.libelle_long
			FROM client c INNER JOIN genre gen ON c.id_genre = gen.id;";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $listeClients = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){

            $unClient = new Client($SQLRow['nom'], $SQLRow['prenom'], $SQLRow['email'], $SQLRow['ville'], date_create($SQLRow['date_naissance']), $SQLRow['poids_ref'],
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

    function insertClient(Client $newClient): bool {
        $conn = getConnexion();

        $SQLQuery= "INSERT INTO userauth (login, mdp) VALUES (:login, :mdp)";
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':login', $newClient->getUser()->getLogin(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':mdp', $newClient->getUser()->getMdp(), PDO::PARAM_STR);
        if (!$SQLStmt->execute()){
            return false;
        }else{
            $newClient->getUser()->setId($conn->lastInsertId());
            $SQLQuery = "INSERT INTO client(nom, prenom, email, ville, date_naissance, 
		poids_ref, poids_vise, taille, telephone, id_genre, id_userauth)
		VALUES (:nom, :prenom, :email, :ville, :dateNaissance, 
		:poidsRef, :poidsVise, :taille, :telephone, :id_genre, :id_userauth)";

            $SQLStmt = $conn->prepare($SQLQuery);
            $SQLStmt->bindValue(':nom', $newClient->getNom(), PDO::PARAM_STR);
            $SQLStmt->bindValue(':prenom', $newClient->getPrenom(), PDO::PARAM_STR);
            $SQLStmt->bindValue(':email', $newClient->getEmail(), PDO::PARAM_STR);
            $SQLStmt->bindValue(':ville', $newClient->getVille(), PDO::PARAM_STR);
            $SQLStmt->bindValue(':dateNaissance', $newClient->getDateNaissance()->format('Y-m-d'), PDO::PARAM_STR);
            $SQLStmt->bindValue(':poidsRef', $newClient->getPoidsRef(), PDO::PARAM_INT);
            $SQLStmt->bindValue(':poidsVise', $newClient->getPoidsVise(), PDO::PARAM_INT);
            $SQLStmt->bindValue(':taille', $newClient->getTaille(), PDO::PARAM_INT);
            $SQLStmt->bindValue(':telephone', $newClient->getTel(), PDO::PARAM_STR);
            $SQLStmt->bindValue(':id_genre', $newClient->getGenre()->getId(), PDO::PARAM_INT);
            $SQLStmt->bindValue(':id_userauth', $newClient->getUser()->getId(), PDO::PARAM_INT);

            if (!$SQLStmt->execute()){
                return false;
            }else{
                return true;
            }
        }

    }