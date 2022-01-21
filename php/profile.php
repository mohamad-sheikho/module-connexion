<?php
session_start();

$bdd = mysqli_connect("localhost", "root", "", "moduleconnexion");
$sesslogin = $_SESSION["username"];
$sessionid = $_SESSION["id"];
$req = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$sesslogin'");
$res = mysqli_fetch_all($req, MYSQLI_ASSOC);
$login = $res[0]['login'];
$prenom = $res[0]['prenom'];
$nom = $res[0]['nom'];
$password = $res[0]['password'];

if (isset($_POST['modifier'])) {
    $prenom10 = $_POST['prenom'];
    $nom10 = $_POST['nom'];
    $login10 = $_POST['login'];
    $password10 =  md5($_POST['passwordChange']);
    $requete = "UPDATE utilisateurs SET login='$login10', prenom='$prenom10', nom='$nom10', password='$password10' WHERE  id = '$sessionid' ";

    $req2 = mysqli_query($bdd, $requete);
    header("Location: ../index.php");
    if ($req2) {
        echo  "vos information ont été modifier avec succès";
    }
}
?>


<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>profil</title>
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
                        <li>
                            <div> <a id="connexionLink" href="login.php">Login</a> <a id="inscriptionLink" href="register.php">Registration</a> </div>;
                        </li>

                    </ul>
            </ul>
        </nav>
    </header>

    <main class="center">
        <div class="container">
            <h1>Vous êtes sur le point de modifier vos informations <?php echo $_SESSION["username"]; ?></h1>
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">modifier profile</p>
                <div class="input-group">
                    <input type="text" placeholder="username" name="login" value='<?php echo $login ?>' />
                </div>
                <div class="input-group">
                    <input type="text" placeholder="prenom" name="prenom" value='<?php echo $prenom ?>' />

                </div>
                <div class="input-group">
                    <input type="text" placeholder="nom" name="nom" value='<?php echo $nom ?>' />
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Ancien Password" name="password" />
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Nouveau Password" name="passwordChange" />
                </div>
                <div class="input-group">
                    <button type="submit" name="modifier" class="btn">Modifier</button>
                </div>
                <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
            </form>
        </div>
    </main>

</body>

</html>
