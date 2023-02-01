<!DOCTYPE html>
<html lang="fr">
<head>

    <?php include 'WebApp/_Layout/_Header.php' ?>
    
    <title>Développeurs</title>    

    <link rel="stylesheet" href="WebApp/_Layout/developpeur.css">

    <script type="text/javascript">
		function afficherDetails(id)
		{
			//alert(numero);
			var ajax = new XMLHttpRequest();			
			ajax.open('GET', 'https://gameblexis.com/Developpeur-detail.php?id=' + id, true);
			
			ajax.onreadystatechange = function()
			{
				if(ajax.readyState === 4)
				{
					reponse = JSON.parse(ajax.responseText);
					cible = document.getElementById("zone-details-" + id);
					cible.innerHTML = "Le talentueux " + reponse[0].nom + " - " + reponse[0].description;
				}
			}
			ajax.send("");
		}
	</script>
</head>

<body class="body">
    <div id="contenu">
        <div id="liste-nouvelles">

            <a onmousedown="afficherDetails(1)">
            <button type="button" class="nouvelle btn btn-warning">
                <div class="nouvelle" id="nouvelle-6">
                    <h3>Keeels</h3>
                <p id="zone-details-1"></p>
                </div>
            </button>
            </a>
            
			
			<a onmousedown="afficherDetails(2)">
            <button type="button" class="nouvelle btn btn-secondary">
                <div class="nouvelle" id="nouvelle-7">
                    <h3>Proyme</h3>
                <p id="zone-details-2"></p>
                </div>
            </button>
            </a>
			
			<a onmousedown="afficherDetails(3)">
            <button type="button" class="nouvelle btn btn-primary">
                <div class="nouvelle" id="nouvelle-8">
                    <h3>Fabios</h3>
                <p id="zone-details-3"></p>
                </div>
            </button>
            </a>

		</div>	
    </div>
</body>

<?php include 'WebApp/_Layout/_Footer.php'?>

</html>