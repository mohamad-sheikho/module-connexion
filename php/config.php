<?php
//Connexion à la base de données
$bdd = mysqli_connect ('localhost' , 'root' , '' , 'moduleconnexion');

//On vérifie si la connexion à la bdd à réussit 
if ($bdd === false) {
    die("Erreur : La connexion à la base de données à échouer." . mysqli_connect_error()) ; 
}

?>