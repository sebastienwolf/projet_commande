<?php

include '../connexion.php';



// if(isset($_POST['nom'])){
if ($_POST['nom'] != "") {
    $idUser = $_POST["id2"];
    $newNom = $_POST["nom"];

    $nom2 = "UPDATE user_p3 SET nom = '$newNom' WHERE iduser_p3 = $idUser";
    $pdo->query($nom2);
}




// if(isset($_POST['prenom'])){
if ($_POST['prenom'] != "") {
    $idUser = $_POST["id2"];
    $newPrenom = $_POST["prenom"];

    $prenom2 = "UPDATE user_p3 SET prenom = '$newPrenom' WHERE iduser_p3 = $idUser";
    $pdo->query($prenom2);

    header('Location: ./admin.php');
}


if ($_POST['email'] != "") {
    $idUser = $_POST["id2"];
    $newEmail = $_POST["email"];

    $email2 = "UPDATE user_p3 SET mail = '$newEmail' WHERE iduser_p3 = $idUser";
    $pdo->query($email2);

    header('Location: ./admin.php');
}

// if (isset($_POST['pseudo'])) {
if ($_POST['pseudo'] != "") {
    $idUser = $_POST["id2"];
    $newPseudo = $_POST["pseudo"];

    $pseudo2 = "UPDATE user_p3 SET pseudo = '$newPseudo' WHERE iduser_p3 = $idUser";
    $pdo->query($pseudo2);

    header('Location: ./admin.php');
}



// RECUPERATION DES VALEURS DE LA FORM DU MENU DEROULANT ET DE L'ID DE LA COMMANDE
// ET LES TRANSFORME EN VARIABLE POUR LES INSERER DANS LA COMMANDE SQL
if (isset($_POST['menu'])) {
    if (!empty($_POST['menu'])) {
        $idUser = $_POST["id2"];
        $newStatut = $_POST["menu"];

        $statut2 = "UPDATE user_p3 SET userType = '$newStatut' WHERE iduser_p3 = $idUser";
        $pdo->query($statut2);

        header('Location: ./admin.php');
    }
}
