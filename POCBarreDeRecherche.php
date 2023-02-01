<div class="zone-texte" style="padding-right: 36%; padding-left:37.5%;">
    <input type="text" id="zone-texte" class="form-control" placeholder="Zone de recherhce" onkeyup="recherche()">
  </div>

  <div id="zoneResultat"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script>
      function recherche()
      {
        var lettres = document.getElementById("zone-texte").value;
        //alert(lettres);
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