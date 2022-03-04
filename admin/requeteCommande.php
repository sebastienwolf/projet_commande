<?php

include '../connexion.php';


//prépare nos variable d'entré
$comLieu = $_POST['lieu'];
$comDate = $_POST['date'];
$comCom = $_POST['commande'];
$comId = $_POST['idClient'];


if (isset($_POST['lieu']) && isset($_POST['date']) && isset($_POST['commande']) && isset($_POST['idclient'])) {

    // vérification si l'utilisateur existe
    $requeteInscription = "INSERT INTO commande (idCommande, lieu, dateHeure, comCommande, statut, idUser_p3) VALUES
            (DEFAULT, '$comLieu', '$comDate', '$comCom', DEFAULT, '$id')";
    $pdo->query($requeteInscription);

    header('Location: ./admin.php');
} else {
    header('Location: ./adminAddCom.php?erreur=1');
}
