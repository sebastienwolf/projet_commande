<?php
include '../../connexion.php';
// COMMANDE SQL, query:  prépare et exécute une requête SQL en un seul appel de fonction,
$stmt = $pdo->query('SELECT * FROM commande');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    <link rel="stylesheet" href="../../livreur/style.css">

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

                <a class="nav-link" href="../admin.php">Client</a>
                <a class="nav-link disabled" href="#">Commande</a>
                <a class="nav-link" href="../adminAddUser.php">ajout utilisateur</a>
                <a class="nav-link" href="../adminAddCom.php">ajout de commande</a>




                <form>
                    <a class="nav-link" href='../../index.php'><span>Déconnexion</span></a>

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
            <p class="toggle" href="#"></a>
            <div class="og_table table-responsive">
                <table class="table table-striped table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Numero Commande</th>
                            <th scope="col">Commande</th>
                            <th scope="col">Lieu</th>
                            <th scope="col">Date - Heure</th>
                            <th scope="col">Numero Client</th>
                            <th scope="col">Statu</th>
                            <th scope="col">Modification</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <?php while ($row = $stmt->fetch()) {
                        $i = $row->idCommande;

                    ?>
                        <tr>
                            <!-- ON UTILISE LE TAG PHP ET ECHO DANS LES CASES DU TABLEAU POUR LES REMPLIR AVEC LES DONNÉES -->
                            <td><?php echo $row->idCommande; ?></td>
                            <td><?php echo $row->comCommande; ?></td>
                            <td><?php echo $row->lieu; ?></td>
                            <td><?php echo $row->dateHeure; ?></td>
                            <td><?php echo $row->idUser_p3; ?></td>
                            <!-- LA CLASS DE LA LIGNE EST APPELER DE LA MEME MANIERE QUE SON CONTENU POUR MODIFIER LE BACKGROUND CSS EN FONCTION DE CE QUI EST ECRIT DEDANS -->
                            <td style="color: white;" class="<?php echo $row->statut; ?>"><?php echo $row->statut; ?></td>
                            <!-- MENU DEROULANT SELECTION DE STATUT -->
                            <form action="./adminComModif.php" method="post">
                                <td><select name="menu" id="menu">
                                        <option value="recue">Reçue</option>
                                        <option value="cours">En cours</option>
                                        <option value="expedie">Expedié</option>
                                        <option value="livre">Livré</option>
                                        <option value="annulation">Annulation</option>
                                    </select>
                                </td>
                                <!-- INPUT DE L'ID DE LA COMMANDE ACTUEL -->
                                <input type="text" hidden name="idCom" value="<?php echo $i ?>">
                                <!-- BOUTON EDIT -->
                                <td><button type="submit" class="btn btn-success" name="edit">Edit</button></td>
                                <td><button type="submit" class="btn btn-danger" name="delete">Delete</button></td>

                            </form>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js'></script>

    <script src="../../livreur/script.js"></script>

</body>

</html>