<?php
include '../connexion.php';
if (isset($_POST['nom']) && isset($_POST['password'])) {

    //prépare nos variable d'entré
    $userNom = $_POST['nom'];
    $userPrenom = $_POST['prenom'];
    $userMail = $_POST['mail'];
    $userPseudo = $_POST['pseudo'];
    $userPassword = $_POST['password'];



    $option = ['cost' => 12,];
    $hash = password_hash($userPassword, PASSWORD_BCRYPT, $option);

    if ($userNom !== "" && $userPrenom !== "" && $userPseudo !== "" && $userMail !== "" && $userPassword !== "") {

        // prepare la requete
        $requete = $pdo->prepare("SELECT pseudo FROM user_p3 where pseudo = :verif");
        // execution de la requete  
        $requete->execute(["verif" => $$userPseudo]);
        /// transformer le retour en tableau 
        $reponse = $requete->fetchAll();
        // vérification du mot de passe en variable 
        $verifMail = count($reponse);


        if ($verifMail == 0) {
            // vérification si l'utilisateur existe
            // $requeteInscription = "INSERT INTO user (idUser, nom, prenom, age, pseudo, mail, mdp) VALUES
            // (DEFAULT, '$userNom', '$userPrenom', '$userAge', '$userPseudo', '$userMail','$hash')";
            $requeteInscription = "INSERT INTO user_p3 (idUser_p3, nom, prenom, mail, mdp, pseudo, userType) VALUES
            (DEFAULT, '$userNom', '$userPrenom', '$userMail', '$hash', '$userPseudo', DEFAULT)";
            $pdo->query($requeteInscription);
            $_SESSION['pseudo'] = $userPseudo;
            header('Location: ../index.php?erreur=6');
        } else {
            header('Location: ../index.php?erreur=5');
        }
    } else {
        header('Location: ../index.php?erreur=3');
    }
} else {
    header('Location: ../index.php');
}