<?php
	//echo 'ok';

	session_start();
	require_once('Donnee/connexion.php');

	if(isset($_GET['game']))
	{
		$SQL_JEUX = "SELECT * FROM jeux WHERE titre LIKE :titre LIMIT 10";

		$game = (String)$_GET['game'];
		$requete = $basededonnees->prepare($SQL_JEUX);
		$requete->bindValue(':titre', "%".$game."%", PDO::PARAM_STR);
		$requete->execute();
		$jeux = $requete->fetchAll(PDO::FETCH_OBJ);


		foreach($jeux as $r)
		{
			?>
			<div>
				<?= $r->titre?>	
			</div>
		<?php
		}
	}
?>