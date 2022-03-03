<?php

include 'connexion.php';

// renomer statut commande

// RECUPERATION DES VALEURS DE LA FORM DU MENU DEROULANT ET DE L'ID DE LA COMMANDE
// ET LES TRANSFORME EN VARIABLE POUR LES INSERER DANS LA COMMANDE SQL
if(isset($_POST['edit'])){
if(!empty($_POST['menu'])) {
  $idCommande = $_POST["id"];
  $statut= $_POST["menu"];
  
  $encours = "UPDATE commande SET statut = '$statut' WHERE idCommande = $idCommande";
  $pdo->query($encours);

  header('Location: ./livreur/livreur_commande.php');
}
}
