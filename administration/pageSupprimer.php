<?php
include_once "../modele/Projet.php";
$reception = filter_var($_POST['id'], FILTER_VALIDATE_INT);

print_r($reception);

include_once "accesseur/ProjetDAO.php";
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
  <link rel="stylesheet" href="pageSupprimer.css">

<!--<p style="text-align: center;">
  <img src="_Layout/Blexis-simple.png" alt="logo" class="img-fluid">
</p>-->

</header>

<body>

  <br><br><br><br>
  <form action="traitementSupprimer.php" method="post">
  <div class="formulaire">
    <div>
        <div class="form-group item-formulaire">
            <label class="col-form-label mt-4" for="inputDefault">Êtes vous sûr de vouloir supprimer cette article ?</label>
        </div>
          
    </div>
  </div>
  <br><br>

  <div class="centrer" >
    <input type="hidden" name="projet" value="<?=formater($projet->id)?>"/>
    <button type="button submit" class="btn btn-success" style="margin-right: 25px;" name="action-effacer" value="Oui" >Confirmer la suppression</button></a>
    <button type="button submit" class="btn btn-danger" name="action-annuler" value="Non">Annuler la suppression</button>
  </div>

  </form>
    
  <br><br><br>
  

</body>
<?php include '../WebApp/_Layout/_Footer.php' ?>

</html>