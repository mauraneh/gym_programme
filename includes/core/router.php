<?php

	/*
		?page=...&action=...&id=...

		page : Permettra de définir la section (ou page) à laquelle on veut accéder
		action : Permettra de définir l'action à effectuer sur cette section
		Le reste sera spécifique pour chaque section / action

		page : par défaut : index
		action : par defaut : view
	*/


	$page = $_GET['page'] ?? 'index';
	$action = $_GET['action'] ?? 'view'; 

	switch ($page){
        case 'index':{
            require_once "includes/core/controllers/controller.php";
            break;
        }
        case 'client':{
           require_once 'includes/core/controllers/controller_client.php';
           break;
        }
        case 'user':{
            require_once 'includes/core/controllers/controller_user.php';
            break;
        }
		case 'accueil':{
			require_once "includes/core/controllers/controller_accueil.php";
			break;
		}
		case 'programme':{
			require_once "includes/core/controllers/controller_programme.php";
			break;
		}
        case 'session':{
            require_once "includes/core/controllers/controller_session.php";
            break;
        }
        case 'poids':{
            require_once "includes/core/controllers/controller_poids.php";
            break;
        }
        case 'blog':{
            require_once "includes/core/controllers/controller_blog.php";
            break;
        }
        case 'contact':{
            require_once "includes/core/controllers/controller_contact.php";
            break;
        }
		default:{
			require_once "includes/core/controllers/controller_error.php";
		}
	}