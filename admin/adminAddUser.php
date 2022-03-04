<?php
include '../connexion.php';
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

                <a class="nav-link" href="./admin.php">Client</a>
                <a class="nav-link" href="./commande/adminCommande.php">Commande</a>
                <a class="nav-link disabled" href="#">ajout utilisateur</a>
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
                <?php
                $i = $_POST["idea"]
                ?>
                <form action="requeteUser.php" method="post" class="formulaireEdit">

                    <label><b>Nom :</b></label>
                    <input type="text" name="nom"><br>

                    <label><b>Prenom :</b></label>
                    <input type="text" name="prenom"><br>

                    <label><b>Email :</b></label>
                    <input type="text" name="mail"><br>

                    <label><b>Mot de passe :</b></label>
                    <input type="password" name="password"><br>

                    <label><b>Pseudo :</b></label>
                    <input type="text" name="pseudo"><br>

                    <label><b>Type d'utilisateur :</b></label>
                    <select name="menu" id="menu">
                        <option value="client">client</option>
                        <option value="livreur">livreur</option>
                    </select>
                    </br>
                    <input type="text" hidden name="id2" value="<?php echo $i ?>">
                    <input class="magique" type="submit" id='submit' value="Valider">
                </form>
            </div>
            <br>
            <?php
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
                if ($err == 1)
                    echo "<p style='color:red'>Utilisateur existe déjà</p>";
                if ($err == 2)
                    echo "<p style='color:red'>Il manque une donnée</p>";
            }
            ?>
        </div>
        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js'>

        </script>

        <script src="../livreur/script.js"></script>

</body>

</html>