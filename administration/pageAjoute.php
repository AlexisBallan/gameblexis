<?php
include_once "../modele/Projet.php";
//$reception = filter_var($_GET['id'], FILTER_VALIDATE_INT);
//print_r($reception);

include "accesseur/ProjetDAO.php";
//$projet = ProjetDAO::detaillerProjet($reception);
//print_r($projet);
?>

<!DOCTYPE html>
<html>
<header>

  <?php include '../WebApp/_Layout/_Header.php' ?>
 
  <title>Accueil</title>

  <!-- CSS only -->
  <link rel="stylesheet" href="../WebApp/_Layout/bootstrap.min.css">
  <link rel="stylesheet" href="pageAjouter.css">

</header>

<body>

  <form action="/administration/traitementAjouter.php" method="post">
    <div class="formulaire" action="projets.php">
      <div>
          <input type="hidden" name="id" value="<?=formater($projet->id)?>"/>
          <input type="hidden" name="image_jeux" value="<?=formater($projet->image_jeux)?>"/>
          <input type="hidden" name="logo" value="<?=formater($projet->logo)?>"/>
          <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Titre</label>
              <textarea class="form-control" rows="2" id="titre" name="titre" placeholder="Titre"></textarea>

            </div>
            <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Courte description</label>
              <textarea class="form-control" rows="2" id="courte_descritption" name="courte_descritption" placeholder="Courte description"></textarea>


            </div>
            <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Description</label>
              <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description"></textarea>

            </div>
            <div class="form-group">
              <label for="formFile" class="form-label mt-4">Logo</label>
              <input class="form-control" type="file" id="formFile">

            </div>
            <div class="form-group">
              <label for="formFile" class="form-label mt-4">Image</label>
              <input class="form-control" type="file" id="formFile">

            </div>
            <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Nom d'entreprise</label>
              <textarea class="form-control" placeholder="Nom d'entreprise" id="entreprise" name="entreprise"></textarea>
            </div>

            <div class="form-group">
              <label class="col-form-label mt-4" for="inputDefault">Prix de vente</label>
              <textarea class="form-control" placeholder="Prix de vente" id="prix" name="prix"></textarea>
            </div>
      </div>
    </div>
    <br><br>
    <div class="centrer">
      <button type="submit" class="btn btn-warning" style="margin-right: 60px; ">Ajouter</button>
      <button type="submit" formaction="/" class="btn btn-danger">Annuler</button>
    </div>
  </form>
  
  <br><br><br>

</body>
<?php include '../WebApp/_Layout/_Footer.php' ?>

</html>