<?php
include("config.php");
session_start();
$page_afficher = "";
if(isset($_GET['page']))
{
    $page_afficher = $_GET['page'];
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Mielux</title>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./css/miel.css">
<link rel="stylesheet" href="./css/connexion.css">
<link rel="stylesheet" href="./css/ajout_miel.css">
<link rel="stylesheet" href="./css/modification_miel.css">



</head>

<body <?php if ($page_afficher == "connexion" or $page_afficher == "ajout_miel" or $page_afficher == "modification_miel"){echo('class="body-yellow"');}?>>
<navbar <?php if ($page_afficher == "connexion" or $page_afficher == "ajout_miel"){echo('style="position: absolute; width: 100%"');}?>>
    <?php include_once("navbar.php"); ?>
</navbar> 
<content>
    <?php
    switch ($page_afficher) {
        case 'connexion':
            include($page_afficher.".php");
            break;

        case 'miel':
            include($page_afficher.".php");
            break;

        case 'ajout_miel':
            include($page_afficher.".php");
            break;

        case 'modification_miel':
            include($page_afficher.".php");
            break;

        case 'suppression_miel':
            include($page_afficher.".php");
            break;

            case 'apiculteurs':
                include($page_afficher.".php");
                break;

        default:
            # code...
            break;

    }
    ?>
</content>
</body>
</html>
