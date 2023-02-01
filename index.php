<!DOCTYPE html>
<html>
  <?php include 'WebApp/_Layout/_Header.php' ?>

<title>Accueil</title>
<link rel="stylesheet" href="WebApp/_Layout/Accueil.css">

<body class="body">
  
  <div class="zone-texte" style="padding-right: 36%; padding-left:37.5%;">
    <input type="text" id="zone-texte" class="form-control" placeholder="Zone de recherhce" onkeyup="recherche()">
  </div>

  <div id="zoneResultat"></div>
  
  <?php
  include "donnee/JeuxDAO.php"; 
  $jeux = JeuxDAO::listerJeux();
      // ENVOYER UN MAIL
        /*
        to      = 'julesbrulon@orange.fr';
        $subject = 'test';
        $message = 'salut';
        $headers = 'From: gameblexis@hotmail.com' . "\r\n" .
            'Reply-To: gameblexis@hotmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        mail($to, $subject, $message, $headers);

        */
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script scr="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script>
      function recherche()
      {
        var lettres = document.getElementById("zone-texte").value;
        //alert(lettres.length);
        if(lettres.length == 0)
        {
          document.getElementById("zoneResultat").innerHTML = "";
          return;
        }
        else
        {
          var request = new XMLHttpRequest();
          request.onreadystatechange = function()
          {
            if(this.readyState == 4 && this.status == 200)
            {
              document.getElementById("zoneResultat").innerHTML = this.responseText;                            
            }
          };

          request.open("GET", "recherche_jeux.php?game="+lettres, true);
          request.send();
        }
      }
    </script>
</body>

<?php include 'WebApp/_Layout/_Footer.php'?>
</html>