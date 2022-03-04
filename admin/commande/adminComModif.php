<?php

include '../../connexion.php';

if (isset($_POST['delete'])) {
    $idCom = $_POST['idCom'];

    $req = "DELETE FROM commande WHERE idCommande = $idCom";
    $pdo->query($req);

    header('Location: ./adminCommande.php');
}

if (isset($_POST['edit'])) {
    if (!empty($_POST['menu'])) {
        $idCommande = $_POST["idCom"];
        $statut = $_POST["menu"];

        $encours = "UPDATE commande SET statut = '$statut' WHERE idCommande = $idCommande";
        $pdo->query($encours);

        header('Location: ./adminCommande.php');
    }
}
