<!DOCTYPE html>
<html>
<?php include 'WebApp/_Layout/_Header.php' ?>

  <title>Accueil</title>
  <link rel="stylesheet" href="WebApp/_Layout/membre.css">
  <!-- CSS only -->
  <link rel="stylesheet" href="_Layout/bootstrap.min.css">

<body>

<?php
  require('/var/www/www.gameblexis.com/donnee/UtilisateurDAO.php');

  if($_SESSION != null) {
    $reception = filter_var($_SESSION['id'], FILTER_VALIDATE_INT);
    //print_r($reception);
    $user = UtilisateurDAO::detaillerUtilisateur($reception);
    ?>


    <form action="/administration/traitementUtilisateur.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?=$user->id?>"/>
      <input type="hidden" name="mdp" value="<?=$user->mdp?>"/>
        <div class="infos">
          <div class="infoPerso">
            <div class="form-group has-success">
              <label class="form-label mt-4" for="inputValid">Nom d'utilisateur</label>
              <textarea class="form-control" rows="2" id="nom" name="nom" placeholder="Nom"><?= $user->nom ?></textarea>
            </div>
            <div class="form-group has-success">
              <label class="form-label mt-4" for="inputValid">Email</label>
              <textarea class="form-control" rows="2" id="email" name="email" placeholder="Email"><?= $user->email ?></textarea>
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label mt-4">Changer d'image de profil</label>
                <input class="form-control" type="file" id="photo" name="photo" placeholder="Photo">
            </div>
            <div class="form-group has-success">
                <label class="form-label mt-4" for="inputValid">Description</label>
                <textarea class="form-control" rows="2" id="description" name="description" placeholder="Description"><?= $user->description ?></textarea>
            </div>
              <div class="form-group has-success">
                <label class="form-label mt-4" for="inputValid">Entreprise</label>
                <textarea class="form-control" rows="2" id="entreprise" name="entreprise" placeholder="Entreprise"><?= $user->entreprise ?></textarea>
          </div>
    
          <button type="submit" class="btn btn-warning btnModifier">Modifier</button>
          </div>
        </div>
    </form>

       

       
        <?php

  } else {
    ?>
    <div class="alert alert-dismissible alert-info">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Attention !</strong>  Veuillez vous connecter pour accéder à votre espace membre !
    </div>

    <?php
  }
 
    ?>
    
</body>

<?php include 'WebApp/_Layout/_Footer.php'?>
</html>