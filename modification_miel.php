<?php
session_start();
include("config.php");
if($_SESSION['administrateur'] !== 1)
{
	header('Location: index.php?page=connexion');
} else {

	if(isset(
		$_POST['miel'], $_FILES['image_miel_modification']))
	{
		
		$miel = $_POST['miel'];

		$contenu_modification = $_POST['contenu_modification'];
		$prix_modification = $_POST['prix_modification'];
		$image_miel_modification = $_FILES['image_miel_modification']['name'];
        $miel_modification = $_POST['miel_modification'];


		//miel = :miel".(strlen($miel_modification) > 0 ? '_modification' : '').",
		// Si le chmaps $miel_modification > 0 alors miel = $miel_modification sinon miel = $miel
		$req = $db->prepare("
		UPDATE miel SET 
		miel = :miel".(strlen($miel_modification) > 0 ? '_modification' : '').",
		contenu = :contenu_modification,
		prix = :prix_modification,
		image_miel = :image_miel_modification
		WHERE miel = :miel");



        $req->bindValue(':miel_modification', $miel_modification);
        $req->bindValue(':contenu_modification', $contenu_modification);
        $req->bindValue(':prix_modification', $prix_modification);
        $req->bindValue(':image_miel_modification', $image_miel_modification);

        $req->bindValue(':miel', $miel);

        $req->execute();

        
		$file_name = $_FILES['image_miel_modification']['name'];
		$file_tmp = $_FILES['image_miel_modification']['tmp_name'];
	    move_uploaded_file($file_tmp,"image_miel/".$file_name);

		header('Location: index.php?page=modification_miel');
	}


}

?>

<div class="container-lg">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="contact-form">
				<h1>Modification D'un Miel</h1>
				 <form action="modification_miel.php" method="POST" enctype="multipart/form-data">  <!-- transférer des données de type binaire -->
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="miel">Choisisez un miel a modifier</label>
                                <select type="text" class="form-control" id="miel" name="miel" required>
                                    <?php
                                    $req = $db->prepare("SELECT * FROM miel ORDER BY id DESC");
                                    $req->execute();

                                    while($result = $req->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $miel = $result['miel'];
                                        echo ('
                                        <option value="'.$miel.'">
                                            '.$miel.'
                                        </option>
                                        ');
                                    }
                                    ?>
                                </select>
							</div>
						</div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="miel_modification">Nouveau nom du miel</label>
                                <input type="text" class="form-control" id="miel_modification" name="miel_modification">
                            </div>
                        </div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="prix_modification">Nouveau prix du miel (en €)</label>
								<input type="number" class="form-control" id="prix_modification" name="prix_modification" required>
							</div>
						</div>
					</div>            
                    <div class="form-group">
                        <label for="image" class="form-label">Changer l'image <b>.jpeg .jpg .png</b></label>
                        <input class="form-control" type="file" id="image_miel_modification" name="image_miel_modification" required>
                    </div >
					<div class="form-group">
						<label for="contenu_modification">Changer le contenu</label>
						<textarea class="form-control" id="contenu_modification" rows="5" name="contenu_modification" required></textarea>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Modifier !</button>
					</div>            
				</form>
			</div>
		</div>
	</div>
</div>
