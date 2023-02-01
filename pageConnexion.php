<!DOCTYPE html>
<html lang="en">
<head>

    <?php include 'WebApp/_Layout/_Header.php' ?>
    
    <title>Connexion</title>
  
    <link rel="stylesheet" href="WebApp/_Layout/connexion.css">
    
</head>
<body class="body">
    <form action="/" class="bs-component" id="form" method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Nom d'utilisateur" name="nom" id="nom">
            <label for="floatingInput">Nom d'utilisateur</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput2" placeholder="Password" name="password" id="password">
            <label for="floatingInput2">Mot de passe</label>
        </div>

        <div id="boutons">
            <button class="source-button btn btn-primary btn-xs" type="submit" tabindex="0" id="connexion">Se connecter</button>
            <button class="source-button btn btn-primary btn-xs" type="submit" tabindex="0">Annuler</button>
        </div>

    </form>
</body>

<?php include 'WebApp/_Layout/_Footer.php'?>

</html>