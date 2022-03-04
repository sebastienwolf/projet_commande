<?php
include '../connexion.php';
// COMMANDE SQL, query:  prépare et exécute une requête SQL en un seul appel de fonction,
$stmt = $pdo->query('SELECT * FROM user_p3');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Page Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
  <link rel="stylesheet" href="../livreur/style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="wrapper">
    <div class="header">Simply only very</div>
    <div class="menu">
      <!--#demo.hoge(v-bind:class="{active:isActive}", v-on:click="isActive=!isActive") click here!
    -->
      <nav class="nav flex-column">
        <a class="nav-link" href="javascript:void(0);" v-bind:class="{active:isActive}" v-on:click="isActive=!isActive"></a>

        <a class="nav-link disabled" href="#">Client</a>
        <a class="nav-link" href="./commande/adminCommande.php">Commande</a>
        <a class="nav-link" href="./adminAddUser.php">ajout utilisateur</a>
        <a class="nav-link" href="./adminAddCom.php">ajout de commande</a>




        <form>
          <a class="nav-link" href='../index.php'><span>Déconnexion</span></a>

          <?php
          // session_start();
          if (isset($_GET['submit'])) {
            if ($_GET['submit'] == true) {
              session_unset();
              header("location:../index.php");
            }
          } else if (isset($_SESSION['pseudo'])) {
            $user = $_SESSION['pseudo'];
            // afficher un message
            echo "<br>Bonjour $user";
          }
          ?>

        </form>

      </nav>

    </div>
    <div class="content">
      <p class="toggle" href="javascript:void(0);" v-bind:class="{active:isActive}" v-on:click="isActive=!isActive"> </p>
      <div class="og_table table-responsive">
        <table class="table table-striped table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Prenom</th>
              <th scope="col">Email</th>
              <th scope="col">Pseudo</th>
              <th scope="col">Type</th>
              <th scope="col">Modifier</th>
              <th scope="col">Purge?</th>
            </tr>
          </thead>

          <?php while ($row = $stmt->fetch()) {
            $i = $row->idUser_p3 ?>
            <tr>
              <!-- ON UTILISE LE TAG PHP ET ECHO DANS LES CASES DU TABLEAU POUR LES REMPLIR AVEC LES DONNÉES -->
              <form action="./modif.php" method="post">
                <td><?php echo $row->idUser_p3; ?></td>
                <td><?php echo $row->nom; ?></td>
                <td><?php echo $row->prenom; ?></td>
                <td><?php echo $row->mail; ?></td>
                <td><?php echo $row->pseudo; ?></td>
                <td><?php echo $row->userType; ?></td>
                <input type="text" hidden name="idea" value="<?php echo $i ?>">
                <td><button type="submit" class="btn btn-success" name="edit">Edit</button></td>
                <td><button type="submit" class="btn btn-danger" name="delete">PURGE</button></td>

              </form>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>

  </div>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js'>

  </script>

  <script src="../livreur/script.js"></script>

</body>

</html>