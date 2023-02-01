<!DOCTYPE html>
<html>
<header>
  
  <title>Accueil</title>

  <!-- CSS only -->
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

<p style="text-align: center;">
  <img src="_Layout/Blexis-simple.png" alt="logo" class="img-fluid">
</p>

<?php include '../WebApp/_Layout/_Header.php' ?>

</header>

<body>

  <br><br><br><br>
  <div class="formulaire">
    <div>
        <div class="form-group item-formulaire">
            <label class="col-form-label mt-4" for="inputDefault">Titre</label>
            <textarea class="form-control" rows="1" placeholder="Titre"></textarea>
          </div>
          <div class="form-group item-formulaire">
            <label class="col-form-label mt-4" for="inputDefault">Courte description</label>
            <textarea class="form-control" rows="2" placeholder="Courte description"></textarea>
          </div>
          <div class="form-group item-formulaire">
            <label class="col-form-label mt-4" for="inputDefault">Description</label>
            <textarea class="form-control" rows="5" placeholder="Description"></textarea>
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
            <input type="text" class="form-control" placeholder="Nom d'entreprise" id="inputDefault">
          </div>
    </div>
  </div>
  <br><br>
  <div class="centrer">
    <button type="button" class="btn btn-warning">Confirmer la modification</button>
    <button type="button" class="btn btn-danger">Annuler</button>   
  </div>
    
  <br><br><br>
  

</body>
<?php include '/WebApp/_Layout/_Footer.php' ?>

</html>