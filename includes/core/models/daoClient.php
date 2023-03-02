<?php

    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/Client.php";
    require_once "includes/core/models/daoUser.php";
    require_once "includes/core/models/daoGenre.php";

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
function getClientByLogin( string $login): Client
{
    $conn = getConnexion();

    $SQLQuery = "SELECT c.id, c.nom, c.prenom, c.email, c.ville, c.date_naissance, 
		c.poids_ref, c.poids_vise, c.taille, c.telephone, id_genre, id_userauth, id_programme
			FROM client c inner join userauth ON id_userAuth = userauth.id
			WHERE login = :login";

    $SQLStmt = $conn->prepare($SQLQuery);
    $SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
    $SQLStmt->execute();

    $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
    $unClient = new Client($SQLRow['nom'], $SQLRow['prenom'], $SQLRow['email'], $SQLRow['ville'], date_create($SQLRow['date_naissance']), $SQLRow['poids_ref'],
        $SQLRow['poids_vise'], $SQLRow['taille'], $SQLRow['telephone']);

    $unClient->setGenre(getGenreById($SQLRow['id_genre']));
    $unClient->setUser(getUserId($SQLRow['id_userauth']));

    $unClient->setId($SQLRow['id']);

    if (is_null($SQLRow['id_programme'])){
        $unClient->setProgramme(new Programme());
    }else{
        $unClient->setProgramme(getProgById($SQLRow['id_programme']));
    }


    $SQLStmt->closeCursor();

    return $unClient;
}
    function updateClient(Client $unClient): bool {
        $conn = getConnexion();

        $SQLQuery = "UPDATE client
                    SET nom= :nom, prenom= :prenom, date_naissance= :dateNaissance, poids_ref= :poidsRef, 
                        poids_vise= :poidsVise, taille= :taille, email= :email, telephone= :telephone, 
                        ville= :ville, id_Genre= :id_genre, id_userauth= :id_userauth, id_programme= :id_programme
                    WHERE id= :id;";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':nom', $unClient->getNom(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':prenom', $unClient->getPrenom(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':email', $unClient->getEmail(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':ville', $unClient->getVille(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':dateNaissance', $unClient->getDateNaissance()->format('Y-m-d'), PDO::PARAM_STR);
        $SQLStmt->bindValue(':poidsRef', $unClient->getPoidsRef(), PDO::PARAM_INT);
        $SQLStmt->bindValue(':poidsVise', $unClient->getPoidsVise(), PDO::PARAM_INT);
        $SQLStmt->bindValue(':taille', $unClient->getTaille(), PDO::PARAM_INT);
        $SQLStmt->bindValue(':telephone', $unClient->getTel(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':id_genre', $unClient->getGenre()->getId(), PDO::PARAM_INT);
        $SQLStmt->bindValue(':id_userauth', $unClient->getUser()->getId(), PDO::PARAM_INT);
        $SQLStmt->bindValue(':id_programme', $unClient->getProgramme()->getId(), PDO::PARAM_INT);
        $SQLStmt->bindValue(':id', $unClient->getId(), PDO::PARAM_INT);

        if (!$SQLStmt->execute()){
            return false;
        }else{
            return true;
        }
    }

    function getClientById(int $id): Client{
        $conn = getConnexion();

        $SQLQuery = "SELECT c.id, c.nom, c.prenom, c.date_naissance, c.poids_ref, 
       c.poids_vise, c.taille, c.email, c.telephone, c.ville
			FROM client c
			WHERE id = :id";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $unClient = new Client($SQLRow['nom'], $SQLRow['prenom'], $SQLRow['email'], $SQLRow['ville'], date_create($SQLRow['date_naissance']), $SQLRow['poids_ref'],
            $SQLRow['poids_vise'], $SQLRow['taille'], $SQLRow['telephone']);

        $unClient->setId($SQLRow['id']);

        $SQLStmt->closeCursor();

        return $unClient;
    }

    function deleteClient(Client $clientToDelete): bool{
        $conn = getConnexion();

        $SQLQuery = "DELETE FROM client WHERE id = :idClient";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':idClient', $clientToDelete->getId(), PDO::PARAM_INT);

        if (!$SQLStmt->execute()){
            return false;
        }else{
            return true;
        }
    }

