<?php

include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $login = $_POST['username'];
    $password = htmlspecialchars(trim($_POST['password']));

    $sql = "SELECT * FROM utilisateurs WHERE login = '$login'";
    $result = mysqli_query($bdd, $sql);
    $fetch = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $row = $result->num_rows;
    if ($row > 0) {
        $_SESSION['username'] = $fetch['login'];
        $_SESSION['id'] = $fetch['id'];
        header("Location:welcome.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

// "../" Je sors du dossier (je remonte)  --> Autant de fois que tu veux ex : ../../PHP/login.php
// PHP/ Je rentre dans le dossier 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.c">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Login</title>
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
    <main class='center'>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
                    <input type="username" placeholder="Username" name="username" value="" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
            </form>
        </div>
    </main>
</body>

</html>