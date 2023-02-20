<?php
session_start(); //lance la session (récupère les variables globales de session)
unset($_SESSION["administrateur"]); // désactive la session "administrateur"
header("Location: index.php"); //renvoie sur la page index.php
?>