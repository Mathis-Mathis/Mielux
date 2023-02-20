<?php
session_start();
include("config.php");
if($_SESSION['administrateur'] !== 1)
{
	header('Location: index.php?page=connexion');
} else {

	if(isset(
		$_POST['miel'], $_FILES['image_miel']))
	{
		$miel = $_POST['miel'];
		$contenu = $_POST['contenu'];
		$prix = $_POST['prix'];
		$image_miel = $_FILES['image_miel']['name'];
	
		$req = $db->prepare('INSERT INTO miel (miel, contenu, prix, image_miel)
		VALUES (:miel, :contenu, :prix, :image_miel)');
	
		$req->execute([
			'miel' => $miel,
			'contenu' => $contenu,
			'prix' => $prix,
			'image_miel' => $image_miel
		]);
	
	
		$file_name = $_FILES['image_miel']['name'];
		$file_tmp = $_FILES['image_miel']['tmp_name'];
		move_uploaded_file($file_tmp,"image_miel/".$file_name);

		
		header('Location: index.php?page=ajout_miel');
	}


}

?>

<div class="container-lg">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="contact-form">
				<h1>Ajout D'un Miel</h1>
				 <form action="ajout_miel.php" method="POST" enctype="multipart/form-data">  <!-- transférer des données de type binaire -->
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="miel">Nom du miel</label>
								<input type="text" class="form-control" id="miel" name="miel" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="prix">Prix du miel (en €)</label>
								<input type="number" class="form-control" id="prix" name="prix" required>
							</div>
						</div>
					</div>            
                    <div class="form-group">
                        <label for="image" class="form-label">Ajouter une image <b>.jpeg .jpg .png</b></label>
                        <input class="form-control" type="file" id="image_miel" name="image_miel" required>
                    </div >
					<div class="form-group">
						<label for="contenu">Contenu</label>
						<textarea class="form-control" id="contenu" rows="5" name="contenu" required></textarea>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Ajouter !</button>
					</div>            
				</form>
			</div>
		</div>
	</div>
</div>