<?php
session_start();
include("config.php");
if($_SESSION['administrateur'] !== 1)
{
	header('Location: index.php?page=connexion');
} else {

	if(isset(
		$_POST['miel']))
	{
        $miel = $_POST['miel'];

        $req = $db->prepare("DELETE FROM miel WHERE miel = '$miel'");
        $req->execute();
		header('Location: index.php?page=suppression_miel');
	}


}

?>



<h1>Suppression D'un Miel </h1>  <br>


<div class="form-group">
    <label for="miel">Choisisez un miel a modifier</label>
    <form action="suppression_miel.php" method="POST">
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
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Supprimer !</button>
        </div>
    </form>
</div>