<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>

    <header>

        <div class="accueil">
            <a href="../index.php">Accueil</a>

        </div>
        <nav>
            <ul>
                <li class="deroulant"><a href="#">Navigation &ensp;</a>
                    <ul class="sous">
                        <li><?php
                            if (!isset($_SESSION["login"])) {
                                echo '<div> <a id="connexionLink"  href="login.php">Login</a> <a id="inscriptionLink" href="register.php">Registration</a> </div>'; ?></li>


                        <li><?php } else {
                                echo '<div><a href="profil.php">Your Profil</a></div>';

                                if ($_SESSION["login"] == "admin") {
                                    echo "<div><a href='welcome.php' style='width:100%;'>Page Admin</a></div>";
                                }
                            } ?>

                        </li>
                    </ul>
            </ul>
        </nav>
    </header>

    <!-- CONNECTION ET SELECTION DE LA DB-->
    <?php

    $bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
    $req = mysqli_query($bdd, "SELECT * FROM `utilisateurs`");
    $res = mysqli_fetch_all($req);

    ?>

    <!-- CREATION DU TABLEAU -->

    <table>
        <!-- entete du tableau -->
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">login</th>
                <th scope="col">prenom</th>
                <th scope="col">nom</th>
                <th scope="col">password</th>

            </tr>
        </thead>
        <!-- corps du tableau -->
        <tbody>
            <?php
            foreach ($res as $key => $value) {
                echo '<tr>';
                foreach ($value as $key2 => $value2) {
                    echo '<th>' . $value2 . '</th>';
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>