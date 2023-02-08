
<?php 
    include '../WebApp/_Layout/_Header.php';

    include_once("../donnee/UtilisateurDAO.php");
    include_once("../modele/Utilisateur.php");
    $_POST['photo'] = $_SESSION['photo'];

    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
          $_POST['photo'] = $_SESSION['photo'];
        }
      }

      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        //$uploadOk = 0;
        $_POST['photo'] = $_FILES["photo"]["name"];
      }

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $_POST['photo'] = $_SESSION['photo'];
      }

      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
          $_POST['photo'] = $_FILES["photo"]["name"];
          $_SESSION['photo'] = $_POST['photo'];
        } else {
          echo "Sorry, there was an error uploading your file.";
          $_POST['photo'] = "photo";
        }
      }

    $utilisateur = new Utilisateur($_POST);

    UtilisateurDAO::editerUtilisateur($utilisateur);

    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['photo'] = $_POST['photo'];


    header('Location: https://gameblexis.com/');
    exit;
?>