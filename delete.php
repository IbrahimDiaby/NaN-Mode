<?php

        session_start();
          if(empty($_SESSION['username']) || !(isset($_SESSION['username']))){
              header("Location: login.php");
          }

            function verify($data){
                $data = trim($data);
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                return $data;
            }

            if(!empty($_POST)){
                $id = verify($_GET['ID']);
                $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
                $req = $db->prepare("DELETE FROM Articles WHERE ID = ?");
                $req->execute(array($id));
                header("Location: mesarticles.php?name=$_SESSION[username]");
            }

            //   $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' ");
    
            //   $lien = verify($_POST['image']);

            //   $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' "); 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supprimer un article</title>
    <script src="JQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="delete.css" type="text/css" />
</head>
<body>
    <center>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <div class="text">
                <p class="alert alert-warning">Voulez-vous vraiment supprimer votre article ? <?php echo $_SESSION['username'] ?></p>
            </div>
            <div class="submit">
            <a href="mesarticles.php?name=<?php echo $_SESSION['username'] ?>"><span class="btn btn-danger">Annuler</span></a>
                <button type="submit" class="btn btn-primary"><span class="ghyphicon ghyphicon-arrow-left"></span>Confirmer</button>
            </div>
        </form>
        
    </center>
</body>
</html>