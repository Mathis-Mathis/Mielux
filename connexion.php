<?php
session_start();
include("config.php");
if(isset(
  $_POST['login'],
  $_POST['password']
))
{
  $login = htmlspecialchars($_POST['login']); 
  $password = htmlspecialchars($_POST['password']);

  $req = $db->prepare("SELECT * FROM user");
  $req->execute();
  $result = $req->fetch(PDO::FETCH_ASSOC);

  if ($login == $result["login"] && $password == $result["password"]){
    $_SESSION["administrateur"] = 1;
    header('Location: index.php');
  } 
}
?>


<div class="container-login" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
  <div class="center">
    <h2>Connectez-vous !</h2>
    <form action="./index.php?page=connexion" method="POST">
      <input type="login" name="login" placeholder="Nom d'utilisateur" required/>
      <input type="password" name="password"placeholder="Mot de passe" required/>
      <button type="submit" class="form-control" style="width: 100%; padding: 15px; margin: 5px">Se connecter</button>
    </form>
    <h2>&nbsp;</h2>
  </div>
</div>