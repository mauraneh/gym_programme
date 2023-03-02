<?php
    require_once 'includes/core/models/daoClient.php';
    require_once 'includes/core/models/daoGenre.php';
    require_once 'includes/core/models/daoProgramme.php';
    require_once 'includes/core/models/daoUser.php';
    require_once 'includes/core/models/daoPoids.php';

    switch ($action) {
        case 'add':{

                if(empty($_POST)){
                    $unClient = new Client();
                }else {
                    $unClient = new Client(
                        htmlentities($_POST['nom']),
                        htmlentities($_POST['prenom']),
                        htmlentities($_POST['email']),
                        htmlentities($_POST['ville']),
                        date_create($_POST['dateNaissance']),
                        htmlentities(intval($_POST['poidsRef'])),
                        htmlentities(intval($_POST['poidsVise'])),
                        htmlentities(intval($_POST['taille'])),
                        htmlentities($_POST['telephone']),
                        getGenreById($_POST['genre']),
                        new User(htmlentities($_POST['login']), password_hash(($_POST['mdp']), PASSWORD_DEFAULT))
                    );
                    $mdpConfirm = $_POST['mdpConfirm'];

                    if(userExists($_POST['login'])){
                        $messageLog= 'Ce login existe déjà';
                    }else if(strcmp($_POST['mdp'], $mdpConfirm) !== 0) {
                        $messageMdp= 'Le mot de pass ne correspond pas';
                    }else{
                        if (insertClient($unClient)){
                            header('Location: index.php?page=user&action=login');
                        }else{
                            $message = "Erreur d'enregistrement !";
                        }
                    }

                }
                $lesGenres = getAllGenre();

                require_once "includes/core/views/form_client.phtml";
                break;
            }
        case 'setProg':{

            $idProg = $_GET['id'] ?? 0;

            $unClient = getClientByLogin($_SESSION['login']);

            $unProgramme = getProgById($idProg);

            $unClient->setProgramme($unProgramme);

            updateClient($unClient);

            header('Location: ?page=accueil');
            break;
        }

        case 'update':{
                $login = $_SESSION['login'];
                $unClient = getClientByLogin($login);

                if(!empty($_POST)){
                    $unClient->setNom(htmlentities($_POST['nom']));
                    $unClient->setPrenom(htmlentities($_POST['prenom']));
                    $unClient->setEmail(htmlentities($_POST['email']));
                    $unClient->setVille(htmlentities($_POST['ville']));
                    $unClient->setDateNaissance((date_create($_POST['dateNaissance'])));
                    $unClient->setPoidsRef(htmlentities(intval($_POST['poidsRef'])));
                    $unClient->setPoidsVise(htmlentities(intval($_POST['poidsVise'])));
                    $unClient->setTaille(htmlentities(intval($_POST['taille'])));
                    $unClient->setTel(htmlentities($_POST['telephone']));
                    $unClient->setGenre(getGenreById($_POST['genre']));


                    if (updateClient($unClient)) {
                        if(!empty($_POST['mdp']))
                        {
                            $unClient->getUser()->setMdp(password_hash($_POST['mdp'], PASSWORD_DEFAULT));
                            $unClient->getUser()->setLogin(htmlentities($_POST['login']));

                            updateUser($unClient->getUser());
                            header('Location: index.php?page=user&action=logout');
                        }
                        //si le mot de passe n'est pas vide dans le $post je fais un update du user si changement de mdp rediriger sur login
                        header('Location: index.php?page=accueil');
                    } else {
                        $message = "Erreur de modification!";
                    }
                }
                $lesGenres = getAllGenre();

                require_once "includes/core/views/form_client.phtml";
                break;
            }
        case 'delete':{
            $login = $_SESSION['login'];
            $unClient = getClientByLogin($login);

                // Supprimer le client
            deletePoids($unClient->getId());
            deleteClient($unClient);
            deleteUser($unClient->getUser());




                $message = 'Compte supprimé.';
                header('Location: index.php');

            break;
        }
    }