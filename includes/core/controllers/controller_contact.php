<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // récupérer les données du formulaire
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        // valider les données du formulaire
        if (empty($nom) || empty($prenom) || empty($email) || empty($message)) {
            $message_alert = 'Veuillez remplir tous les champs du formulaire.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message_alert = 'Veuillez saisir une adresse email valide.';
        } else {
            // envoyer l'email
            $to = 'maurane.hugon@gmail.com';
            $subject = 'Nouveau message de formulaire de contact';
            $message_body = "Nom: $nom\nPrénom: $prenom\nEmail: $email\n\nMessage:\n$message";
            $headers = "From: $email\r\n";

            if (mail($to, $subject, $message_body, $headers)) {
                $message_alert = 'Votre message a été envoyé avec succès.';
            } else {
                $message_alert = 'Une erreur s\'est produite lors de l\'envoi de votre message.';
            }
        }
    }

    require_once 'includes/core/views/form_contact.phtml';