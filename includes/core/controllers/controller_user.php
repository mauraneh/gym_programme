<?php
    require_once "includes/core/models/Client.php";

switch ($action){
    case 'login':{
        require_once 'includes/core/models/daoUser.php';

        if(!empty($_POST)){
            $loginUsed = $_POST['user'];
            $mdpUsed = $_POST['mdp'];

            if(userExists($loginUsed)){
                if(validedAuth($loginUsed, $mdpUsed)){
                    $_SESSION['login'] = $loginUsed;
                    header('Location: index.php?page=accueil');
                }else{
                    $message = 'Mauvaise information d\'indentification';
                }
            }else{
                $message = 'Utilisateur inconnu';
            }

        }
        require_once 'includes/core/views/form_auth.phtml';
        break;
    }
    case 'logout':{
        if (isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }
        header('Location: index.php');
        break;
    }

    default:{

    }
}