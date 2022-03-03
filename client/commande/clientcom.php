<?php
include "../../connexion.php";
if (!isset($_SESSION['id'])) {
  session_start();
}
if (isset($_POST['lieu']) && isset($_POST['dateTime']) && isset($_POST['commande'])) {
  // connexion à la base de données


  // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
  // pour éliminer toute attaque de type injection SQL et XSS
  $userLieu = $_POST['lieu'];
  $dateTime = $_POST['dateTime'];
  $dateCommande = $_POST['commande'];
  $id = $_SESSION['id'];

  $requeteClient = "INSERT INTO commande (idCommande,lieu,dateHeure,comCommande,statut,idUser_p3) VALUES
        (DEFAULT, '$userLieu', '$dateTime', '$dateCommande',DEFAULT, '$id' )";
  $pdo->query($requeteClient);

  header('Location: ../client.php');
} else {
  header('Location: ./clientCommande.php');
}
