<?php
    require_once 'includes/core/models/bdd.php';
    function userExists(string $login): bool{
        $conn= getConnexion();

        $SQLQuery= "
        SELECT COUNT(id) as existe
        FROM userauth
        WHERE login = :login";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $loginOk = $SQLRow['existe'];

        $SQLStmt->closeCursor();

        return ($loginOk > 0);
    }

    function validedAuth(string $login, string $mdp): bool{
        $conn = getConnexion();

        $SQLQuery = "
			SELECT mdp
			FROM userauth
			WHERE login = :login	
		";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $mdpBDD = $SQLRow['mdp'];

        $SQLStmt->closeCursor();

        return ($mdp == $mdpBDD);
    }
    function getUserId(int $id): User{
        $conn = getConnexion();

        $SQLQuery = "
			SELECT id, login, mdp
			FROM userauth
			WHERE id = :id	
		";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $newUser = new User($SQLRow['login'], $SQLRow['mdp']);
        $newUser->setId($id);

        $SQLStmt->closeCursor();

        return ($newUser);
    }