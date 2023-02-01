<?php
include_once "../modele/Projet.php";
$reception = filter_var($_POST['id'], FILTER_VALIDATE_INT);
//print_r($reception);

include "accesseur/ProjetDAO.php";
$projet = ProjetDAO::detaillerProjet($reception);
//print_r($projet);
?>

<!DOCTYPE html>
<html>
<header>

  <?php include '../WebApp/_Layout/_Header.php' ?>
 
  <title>Accueil</title>

  <!-- CSS only -->
  <link rel="stylesheet" href="../WebApp/_Layout/bootstrap.min.css">
  <style>
    .testFlex {
      display: flex;
      justify-content: center;
      width: 100%;
    }

    .boxDeJeux {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .centrer {
      display: flex;
      justify-content: center;
    }

    .formulaire{
        display: flex;
        justify-content: center;
        
        width: auto;
    }
    .item-formulaire{
        display: flex;
        flex-direction: column;
    }

    @media screen {
      @media(max-width: 999px) {
        .boxDeJeux {
          display: flex;
          flex-direction: column;
          justify-content: center;
        }
      }

      @media(min-width: 1000px) {
        .boxDeJeux {
          display: flex;
          flex-direction: row;
          justify-content: space-around;
        }

      }

    }
  </style>

</header>

<body>

  <form action="/administration/traitement.php" method="post">
    <div class="formulaire" action="projets.php">
      <div>
          <input type="hidden" name="id" value="<?=formater($projet->id)?>"/>
          <input type="hidden" name="image_jeux" value="<?=formater($projet->image_jeux)?>"/>
          <input type="hidden" name="logo" value="<?=formater($projet->logo)?>"/>
          <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Titre</label>
              <textarea class="form-control" rows="2" id="titre" name="titre" placeholder="Titre"><?= formater($projet->titre) ?></textarea>

            </div>
            <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Courte description</label>
              <textarea class="form-control" rows="2" id="courte_descritption" name="courte_descritption" placeholder="Courte description"><?= formater($projet->courte_descritption) ?></textarea>


            </div>
            <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Description</label>
              <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description"><?= formater($projet->description) ?></textarea>

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
              <textarea class="form-control" placeholder="Nom d'entreprise" id="entreprise" name="entreprise"><?= formater($projet->entreprise)?></textarea>
            </div>
            <div class="form-group item-formulaire">
              <label class="col-form-label mt-4" for="inputDefault">Prix</label>
              <textarea class="form-control" placeholder="Nom d'entreprise" id="prix" name="prix"><?= formater($projet->prix)?></textarea>
            </div>
      </div>
    </div>
    <br><br>
    <div class="centrer">
      <button type="submit" class="btn btn-warning" style="margin-right: 60px;" >Confirmer la modification</button>
      <button type="submit" formaction="/" class="btn btn-danger">Annuler</button>   
    </div>
  </form>
  
  <br><br><br>

</body>
<?php include '../WebApp/_Layout/_Footer.php' ?>

</html>