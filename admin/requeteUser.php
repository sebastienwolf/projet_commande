<?php

include '../connexion.php';


//prépare nos variable d'entré
$userNom = $_POST['nom'];
$userPrenom = $_POST['prenom'];
$userMail = $_POST['mail'];
$userPassword = $_POST['password'];
$userPseudo = $_POST['pseudo'];
$userType = $_POST['menu'];

if ($_POST['nom'] != "" && $_POST['password'] != "" && $_POST['prenom'] != "" && $_POST['mail'] != "" && $_POST['pseudo'] != "") {


    $option = ['cost' => 12,];
    $hash = password_hash($userPassword, PASSWORD_BCRYPT, $option);


    // prepare la requete
    $requete = $pdo->prepare("SELECT pseudo FROM user_p3 where pseudo = :verif");
    // execution de la requete  
    $requete->execute(["verif" => $userPseudo]);
    /// transformer le retour en tableau 
    $reponse = $requete->fetchAll();
    // vérification du mot de passe en variable 
    $nombreUser = count($reponse);


    if ($nombreUser == 0) {
        // vérification si l'utilisateur existe
        $requeteInscription = "INSERT INTO user_p3 (idUser_p3, nom, prenom, mail, mdp, pseudo, userType) VALUES
            (DEFAULT, '$userNom', '$userPrenom', '$userMail', '$hash', '$userPseudo', '$userType')";
        $pdo->query($requeteInscription);

        header('Location: ./admin.php');
    } else {
        header('Location: ./adminAddUser.php?erreur=1');
    }
} else {
    header('Location: ./adminAddUser.php?erreur=2');
}
