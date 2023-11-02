<?php 
$title = "Nous contacter";
require 'header.php'; 
?>
<link rel="stylesheet" href="style/style.css"> <!-- relier la page style a index -->
<body>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST["nom"];
            $email = $_POST["email"];
            $message = $_POST["message"];
        
            // Vous pouvez ajouter ici le code pour traiter les données, par exemple, envoyer un e-mail.
            // Voici un exemple d'envoi d'e-mail avec la fonction mail() de PHP :
            $destinataire = "chloe.montenat.defays@gmail.com";
            $sujet = "Nouveau message de contact de $nom";
            $corps = "Nom : $nom\nEmail : $email\nMessage : $message";
            $entetes = "De : $email";
        
            if (mail($destinataire, $sujet, $corps, $entetes)) {
                echo "Votre message a été envoyé avec succès." ;
            } else {
                echo "Une erreur s'est produite lors de l'envoi du message. Veuillez réessayer.";
            }
        } else {
            ?>
            <div class="formulaire">
            <h1>Contactez-nous</h1>
                <form action="contact.php" method="post">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message :</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
            <?php
        }
?>

<?php require 'footer.php'; ?>