<!DOCTYPE html>
<html>
  <?php include 'WebApp/_Layout/_Header.php' ?>

<title>Accueil</title>
<link rel="stylesheet" href="WebApp/_Layout/Accueil.css">

<body class="body">  
  <?php
  include "donnee/JeuxDAO.php"; 
  $jeux = JeuxDAO::listerJeux();
      $iteration = 0;
      foreach($jeux as $jeu)
      {
        if($iteration == 0){
          ?><div class="boxDeJeux"><?php
          $iteration = $iteration + 1;
        }
        if($iteration <= 3){
          ?>
          <div style="width: 100%;" class="testFlex">
          
            <div class="card border-warning mb-3" style="max-width: 20rem;">
              <div class="card-header">Jeux #<?= $jeu->id ?></div>
              <div class="card-body">
                <h4 class="card-title"><?= $jeu->titre ?></h4>
                <p class="card-text"><?= $jeu->courte_descritption ?></p>
                <p class="card-text"><?= $jeu->description ?></p>
                <form action="PageListeDt.php" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $jeu->id ?>"/>
                    <button type="submit" class="btn btn-secondary">En savoir plus</button>
                </form>
                				
              </div>
            </div>
          </div>
      <?php
      $iteration = $iteration + 1;
        } else {
          ?>
          </div>
          <div class="boxDeJeux">
          <div style="width: 100%;" class="testFlex">
            <div class="card border-warning mb-3" style="max-width: 20rem;">
              <div class="card-header">Jeux #<?= $jeu->id ?></div>
              <div class="card-body">
                <h4 class="card-title"><?= $jeu->titre ?></h4>
                <p class="card-text"><?= $jeu->courte_descritption ?></p>
                <p class="card-text"><?= $jeu->description ?></p>
                <form action="PageListeDt.php" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $jeu->id ?>"/>
                    <button type="submit" class="btn btn-secondary">En savoir plus</button>
                </form>
              </div>
            </div>
          </div>
          <?php
          $iteration = 1;
        }
      }
      ?>
    </div>
</body>

<?php include 'WebApp/_Layout/_Footer.php'?>
</html>