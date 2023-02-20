<?php
require_once 'includes/core/views/form_contact.phtml';

// Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        // Adresse email du destinataire
        $destinataire = "maurane.hugon@gmail.com";

        // Sujet du message
        $sujet = "Nouveau message de $nom";

        // Corps du message
        $corps_message = "Nom : $nom\n";
        $corps_message .= "Email : $email\n\n";
        $corps_message .= "Message :\n$message";

        // En-têtes du message
        $en_tetes = "From: $nom <$email>\r\n";
        $en_tetes .= "Reply-To: $email\r\n";
        $en_tetes .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Envoyer le message
        mail($destinataire, $sujet, $corps_message, $en_tetes);

        // Rediriger l'utilisateur vers une page de confirmation
        header("Location: index.php?page=confirmation");
        exit;
    }

