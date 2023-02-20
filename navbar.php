<?php
ini_set('display_errors', 'off'); //n'affiche plus les erreurs
session_start();
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=index">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=miel">Nos miels</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Nos apiculteurs</a>
        </li>
        <?php   
            if($_SESSION["administrateur"] == 1)
            {
                
                echo('
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Administration
                </a>
                ');

                echo('
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?page=ajout_miel">Ajout d\'un miel</a></li>
                        <li><a class="dropdown-item" href="index.php?page=modification_miel">Modification d\'un miel</a></li>
                        <li><a class="dropdown-item" href="index.php?page=suppression_miel">Suppression d\'un miel</a></li>
                    </ul>
                </li>
                ');

                echo('
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="deconnexion.php">Se déconnecter</a>
                </li>
                ');

            } else {
                echo('
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=connexion">Connexion</a>
                </li>');
            }
        ?>
      </ul>
    </div>
  </div>
</nav>