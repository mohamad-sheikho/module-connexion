<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Accueil" content="Page d'accueil">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Accueil</title>
</head>

<body>
    <header>

        <div class="accueil">
            <a href="index.php">Accueil</a>

        </div>
        <nav>
            <ul>
                <li class="deroulant"><a href="#">Navigation &ensp;</a>
                    <ul class="sous">
                        <li><?php
                            if (!isset($_SESSION["login"])) {
                                echo '<div> <a id="connexionLink"  href="php/login.php">Login</a> <a id="inscriptionLink" href="php/register.php">Registration</a> </div>'; ?></li>


                        <li><?php } else {
                                echo '<div><a href="profil.php">Your Profil</a></div>';

                                if ($_SESSION["login"] == "admin") {
                                    echo "<div><a href='php/welcome.php' style='width:100%;'>Page Admin</a></div>";
                                }
                            } ?>

                        </li>
                    </ul>
            </ul>
        </nav>
    </header>


    <div class="titre">
        <link href='https://fonts.googleapis.com/css?family=Yellowtail:400' rel='stylesheet' type='text/css'>

        <h1 class="neonText">
            Bienvenue
        </h1>

    </div>
    <!--
    <div class="titre">
        <h1>Bienvenue</h1>
    </div>
                        -->

    <?php


    if (isset($_POST["decoBtn"])) {
        session_destroy();
        header("location:#");
    }
    ?>
</body>

</html>