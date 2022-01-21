<?php

include 'config.php';

error_reporting(0);

session_start();
if (isset($_POST['submit'])) {
	$login = $_POST['username'];
	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM utilisateurs WHERE login='$login'";

		$sql = " INSERT INTO `utilisateurs`( `login`, `prenom`, `nom`, `password`) VALUES ('$login','$prenom','$nom','$password')";
		$result = mysqli_query($bdd, $sql);
		if ($result) {
			echo "<script>alert('Wow! User Registration Completed.')</script>";
			$login = "";
			$prenom = "";
			$nom = "";
			$_POST['password'] = "";
			$_POST['cpassword'] = "";
		} else {
			echo "<script>alert('Woops! Something Wrong Went.')</script>";
		}
	} else {
		echo "<script>alert('Woops! Email Already Exists.')</script>";
	}
} else {
	echo "<script>alert('Password Not Matched.')</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Register</title>
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
	<main class="center">
		<div class="container">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
				<div class="input-group">
					<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="prenom" name="prenom" value="<?php echo $prenom; ?>" required>

				</div>
				<div class="input-group">
					<input type="text" placeholder="nom" name="nom" value="<?php echo $nom; ?>" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Password" name="password" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Confirm Password" name="cpassword" required>
				</div>
				<div class="input-group">
					<button name="submit" class="btn">Register</button>
				</div>
				<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
			</form>
		</div>
	</main>
</body>

</html>