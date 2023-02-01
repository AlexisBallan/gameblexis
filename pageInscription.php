<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php 
        include 'WebApp/_Layout/_Header.php' 
    ?>
   
    <title>Inscription</title>

    <link rel="stylesheet" href="WebApp/_Layout/inscription.css">

    <script type="text/javascript">
        var div;

        function afficher(select){
            var nouv = div || document.getElementById("entreprisename"),
                i = select.selectedIndex;
            nouv.style.display = (select.options[i].value == "oui") ? "block" : "none";
        }

        function validate() {
 
            var a = document.getElementById("floatingInput3").value;
            var b = document.getElementById("floatingInput4").value;

            if (a!=b) {
                alert("Les mots de passe ne correspondent pas.");
                return false; }
            else {
                //alert("Les mots de passe correspondent.");
                return true; }
        }
    </script>
    
</head>
<body class="body">
    
    <form class="bs-component" id="form" action="traitementInscription.php" method="post" onSubmit="return validate()">

    <input type="hidden" name="description" value="desc"/>
    <input type="hidden" name="photo" value="photo"/>
    <input type="hidden" name="admin" value="0"/>

        <!-- NOM D'UTILISATEUR -->
        <div class="form-group form-floating mb-3" id="username">
            <input type="text" class="form-control" id="floatingInput2" placeholder="Nom d'utilisateur" name="nom">
            <label for="floatingInput2">Nom d'utilisateur</label>
        </div>

        <div class="form-group form-floating mb-3" id="mail">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@exemple.com" name="email">
            <label for="floatingInput">Adresse courriel</label>
        </div>
        
        <!-- MOT DE PASSE -->
        <div class="form-group form-floating mb-3" id="password">
            <input type="password" class="form-control" id="floatingInput3" placeholder="Password" name="mdp">
            <label for="floatingInput3">Mot de passe</label>
        </div>
        
        <div class="form-group form-floating mb-3" id="password" >
            <input type="password" class="form-control" id="floatingInput4" placeholder="Password" name="mdpConfirmation" > 
            <label for="floatingInput4">Confirmer le mot de passe</label>
        </div>

        <!-- ENTREPRISE -->
        <div class="form-group">            
            <label for="selectionEntreprise" class="form-label mt-4">Avez-vous une entreprise ?</label>
            <select class="form-select" id="selectionEntreprise"   onchange="afficher(this);" >
                <option value="choisir"> Choisir</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
            <div class="form-floating mb-3" id="entreprisename" style="display:none" >
                <input type="text" class="form-control" id="floatingInput2" placeholder="Nom de l'entreprise"name="entreprise">
                <label for="floatingInput2">Nom de l'entreprise</label>
            </div>
        </div>

        <br><br>


        <div id="boutons">
            <button class="source-button btn btn-primary btn-xs" type="submit" tabindex="0" id="inscription" >S'inscrire</button>
            <button class="source-button btn btn-primary btn-xs" formaction="/" type="button" tabindex="0">Annuler</button>
        </div>

    </form>

    <footer>
        <?php include 'WebApp/_Layout/_Footer.php' ?>
    </footer>

</body>
</html>