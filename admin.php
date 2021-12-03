<?php
function supprimer($f){
	unlink('demandes' . '/' .$f);
}

session_start();
if(!isset($_SESSION["pseudo"])){
	header("Location: connexion.php");
	exit(); 
}
$dossier = 'demandes';
$fichiers = array_diff(scandir($dossier), array('.', '..', '.gitignore'));
?>
<!DOCTYPE html>
<html>
	<body>
		<p>Affichage des demandes d'ajout non traitées</p>
<form action="" method="post" name="suppression">
  <?php foreach($fichiers as $f): ?>
		<? $contenu = file_get_contents($dossier .'/' . $f); ?>
		<pre><?= $contenu; ?></pre>
		<input type="submit" name="supprimer" value="insert"/>
	  <?if($_POST['supprimer'] and $_SERVER['REQUEST_METHOD'] == "POST"){supprimer($f);}?>
  <?php endforeach; ?>
</form>
	<a href="deconnexion.php">Déconnexion</a>
	</body>
</html>

