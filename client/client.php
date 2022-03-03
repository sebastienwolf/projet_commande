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
        <a class="nav-link" href="javascript:void(0);" v-bind:class="{active:isActive}" v-on:click="isActive=!isActive">Home</a>

        <a class="nav-link" href="./commande/clientCommande.php">commande</a>

        <form>
          <a class="nav-link" href='../index.php'><span>Déconnexion</span></a>

          <?php
          session_start();
          if (isset($_GET['submit'])) {
            if ($_GET['submit'] == true) {
              session_unset();
              header("location:../adminPage.php");
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
        <form action="./clientcom.php" method="POST" id='test' onforminput="alert('Vous venez de saisir du contenu')">

        </form>
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