<!DOCTYPE html>
<html>
<header>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>

  <link rel="stylesheet" href="_Layout/bootstrap.min.css">
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

    .logo {
      display: flex;
      justify-content: center;
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
  
  <?php include '_Layout/_Header.php' ?>   
</header>

<body>

  <br><br><br><br>
  <div class="boxDeJeux">

    <div style="width: 100%;" class="testFlex">

      <div class="card border-warning mb-3" style="max-width: 20rem;">
        <div class="card-header">Jeux #1</div>
        <div class="card-body">
          <h4 class="card-title">Le monde enchanter des lutins</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        </div>
      </div>
    </div>
    <div style="width: 100%;" class="testFlex">

      <div class="card border-warning mb-3" style="max-width: 20rem;">
        <div class="card-header">Jeux #2</div>
        <div class="card-body">
          <h4 class="card-title">Faux pas-poussé</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        </div>
      </div>
    </div>

    <div style="width: 100%;" class="testFlex">

      <div class="card border-warning mb-3" style="max-width: 20rem;">
        <div class="card-header">Jeux #3</div>
        <div class="card-body">
          <h4 class="card-title">Jean-pascal casse la démarche</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        </div>
      </div>

    </div>
  </div>

  <div class="boxDeJeux ">

    <div style="width: 100%;" class="testFlex">
      <div class="card border-warning mb-3" style="max-width: 20rem;">
        <div class="card-header">Jeux #4</div>
        <div class="card-body">
          <h4 class="card-title">gragra le grigri</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        </div>
      </div>
    </div>

    <div style="width: 100%;" class="testFlex">
      <div class="card border-warning mb-3" style="max-width: 20rem;">
        <div class="card-header">Jeux #5</div>
        <div class="card-body">
          <h4 class="card-title">Minekraphte</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        </div>
      </div>
    </div>

    <div style="width: 100%;" class="testFlex">

      <div class="card border-warning mb-3" style="max-width: 20rem;">
        <div class="card-header">Jeux #6</div>
        <div class="card-body">
          <h4 class="card-title">Grand Test Auto</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        </div>
      </div>
    </div>

  </div>

</body>

</html>