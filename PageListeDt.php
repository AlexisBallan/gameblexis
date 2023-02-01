<!DOCTYPE html>
<html>
<header>

  <title>Page Liste Detailee</title>

  <link rel="stylesheet" href="WebApp/_Layout/_ListeDetaillee.css">

  <link rel="stylesheet" href="WebApp/_Layout/bootstrap.min.css">
  
  <?php include 'WebApp/_Layout/_Header.php' ?>

  <script>
    function afficherLSTD(id)
    {
      var ajax = new XMLHttpRequest();
      ajax.open('GET', 'https://gameblexis.com/ListeDtSwipe.php?id=' + id, true);

      ajax.onreadystatechange = function() {
          if (ajax.readyState === 4) {
              reponse = JSON.parse(ajax.responseText);
              console.log(reponse[0]);
              cibleTitre = document.getElementById("lst-titre"); 
              cibleTitre.innerHTML = reponse[0].titre;
              cibleCourteDescription = document.getElementById("lst-courte-description");
              cibleCourteDescription.innerHTML = reponse[0].courte_descritption;
              cibleDescription = document.getElementById("lst-description");
              cibleDescription.innerHTML = reponse[0].description;
          }
      }
      ajax.send("");
    }

    var idJeu;
    var listeJeux = 6;

    function setId(id){
      idJeu = id;
    }

    function getId(){
      return idJeu;
    }

    function next(id) {
      idJeu = id;
      //console.log("oui");
      //console.log(idJeu);
      //console.log(listeJeux);
      if (idJeu < listeJeux) {
        idJeu++;
        console.log(idJeu);
        afficherLSTD(idJeu);
      }

      return idJeu;
    }

    function previous(id) {
      idJeu = id;
      console.log("oui");
      if (idJeu > 1) {
        idJeu--;
        afficherLSTD(idJeu);
        console.log(idJeu);
      }
      return idJeu;
    }
  </script>
</header>

<body>

<?php
  require('/var/www/www.gameblexis.com/donnee/ProjetDAO.php');
  $reception = filter_var($_POST['id'], FILTER_VALIDATE_INT);
  //print_r($reception);
  $projet = ProjetDAO::detaillerProjet($reception);

  $AcutalId = $projet->id;
?>
  <script>
    window.onload = function(){
      setId(<?=$AcutalId?>);
    };
  </script>

  <button onclick="previous(getId())">jeu precedent</button>
  <button onclick="next(getId())">jeu suivant</button>

  <div class="containerPrincipale">
      <div class="containerInfos">
        <h2 id="lst-titre"><?= $projet->titre ?></h2>
        <p class="mb-0" id="lst-courte-description"><?= $projet->courte_descritption ?></p>
        <p class="mb-0" id="lst-description"><?= $projet->description ?></p>
      <figcaption class="blockquote-footer">
        Entreprise : <cite title="Source Title"><?= $projet->entreprise ?></cite>
      </figcaption>
  <div class="achat">
  
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

          <input type="hidden" name="business" value="sb-r43xmm22123205@business.example.com">

          <input type="hidden" name="notify_url" value="https://gameblexis.com/IPN/testReception.php">
          <input type="hidden" name="return" value="https://gameblexis.com/">
          <input type="hidden" name="cmd" value="_xclick"/>
          <input type="hidden" name="item_name" value="Orkia-29A">
          <input type="hidden" name="item_number" value="NA">
          <input type="hidden" name="amount" value="<?= $projet->prix ?>">
          <input type="hidden" name="currency_code" value="CAD">
          <input type="submit" class="btn btn-secondary" value="Acheter"/>
        </form>

    <span><?= $projet->prix ?> $</span>
    </div>
  </div>

    <div class="imageRep card border-light mb-3" style="max-width: 50rem;">
      <img src="WebApp/illustration/imageRep.png" alt="pp">
    </div>
  </div>
</body>
<?php include 'WebApp/_Layout/_Footer.php' ?>

</html>