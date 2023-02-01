<?php 
//Lancer la session
session_start();
?>
<header class="header" >
  <link rel="stylesheet" href="../WebApp/_Layout/bootstrap.min.css">
  <link rel="stylesheet" href="../WebApp/_Layout/_Header.css">
  <link rel="stylesheet" href="../WebApp/_Layout/_Footer.css">

  <meta charset="iso-8859-1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<div class="topbar">
	  <p style="text-align: center;">
		<a href="/">
		  <img src="../WebApp/_Layout/image/Blexis-simple.png" class="img-fluid" alt="logo"> 
		  </a>
	  </p>
	  
	  
			<?php

    require('/var/www/html/gameblexis/connexion.php');
        
    $SQL_UTILISATEURS = "SELECT * FROM utilisateurs";

    $requete = $basededonnees->prepare($SQL_UTILISATEURS);
    $requete->execute();
    $users = $requete->fetchAll(PDO::FETCH_OBJ);

    $connexion = false;

    if($_SESSION == null){
      if($_POST != null && count($_POST) == 2){

        foreach($users as $user){          

            if (password_verify($_POST['password'], $user->mdp) && $_POST['nom'] == $user->nom)
            {
              $_SESSION['nom'] = $user->nom;
              $_SESSION['mdp'] = $user->mdp;
              $_SESSION['id'] = $user->id;
              $_SESSION['photo'] = $user->photo;

              if($user->admin == 1){
                $_SESSION['admin'] = true;
              } else {
                $_SESSION['admin'] = false;
              }
              header("Refresh:0");

            $connexion = true;
            }
          
        }

        if($connexion == false){
          header('Location: https://gameblexis.com/pageConnexion.php');
          exit();
        }
      } else {
        ?>
        <div class="formCI">
        <form action="/pageConnexion.php" method="post">
          <button type="submit" class="btn btn-secondary">Connexion</button>
        </form>  

        <form action="/pageInscription.php" method="post">
          <button type="submit" class="btn btn-secondary">Inscription</button>
        </form>
		</div>
        <?php
      }
    }else {
      ?>
      <div class="avatar">
		  <a href="/membre.php" class="lienProfil">
        <?php 
        if($_SESSION['photo'] != "photo"){
          ?>
          <img class="img-user" src="/upload/<?=$_SESSION['photo']?>" alt="utilisateur">
          <?php
        } else {
          ?>
            <img class="img-user" src="/WebApp/_Layout/image/utilisateur.png" alt="utilisateur">
          <?php
        }
        ?>
			</a>
			
        <div class="msg-accueil">Bonjour <?= $_SESSION['nom'] ?></div>  
        <form action="/deconnexion.php" method="post">
          <input type="hidden" name="deconnexion" id="deconnexion" value="deconnexion"/>
          <button type="submit" name="deconnexion" class="btn btn-secondary">Déconnexion</button>
        </form>
        <?php
          if($_SESSION['admin'] == true){
            ?>
            <form action="/administration/pageAdministration.php">
              <button type="submit" class="btn btn-danger">Administration</button>
            </form>
        <?php
          }
        ?>
        
    </div>
      <?php
    }
?>
		</div>
	</div>
  <nav>
    <ul class="menu">
      <li>
        <a href="/" class="lienNavBar">
          Accueil 
        </a>
                          
      </li>
      <li>
		<a href="membre.php" class="lienNavBar">
			Espace Membre
		</a>
      </li>
      <li>
        <a href="APropos.php" class="lienNavBar">
          A propos                  
        </a>
      </li>
      <li>
        <a href="Developpeur.php" class="lienNavBar">
          Développeurs                  
        </a>
      </li>          
    </ul>
  </nav>
</header>
