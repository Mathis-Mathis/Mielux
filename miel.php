<?php

include("config.php");
$req = $db->prepare("SELECT * FROM miel ORDER BY id DESC");
$req->execute();
?> 
<div class="row">


<!-- Boucle PHP pour afficher chaque vignette -->
<?php while($result = $req->fetch(PDO::FETCH_ASSOC)) { ?>
  <div class="card-container">
    <div class="card">
      <div class="card-front">
        <div class="container text-center">
          <h4><b><?php echo($result['miel']);?></b></h4> 
          <p><?php echo($result['prix']);?>€</p> 
          <img src="./image_miel/<?php echo($result['image_miel']);?>" class="container">
        </div>
      </div>
      <div class="card-back">
        <div><?php echo($result['contenu']);?></div>
      </div>
    </div>
  </div>
<?php
}
?>
