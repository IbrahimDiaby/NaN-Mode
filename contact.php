<?php
    session_start();
    if(empty($_SESSION['username']) || !(isset($_SESSION['username']))){
        header("Location: login.php");
    }

    else{
        function verify($data){
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            return $data;
        }

        $id = verify($_GET['ID']);
        $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
        
        $require=$db->query("SELECT * FROM Articles WHERE ID = $id");
        $test=$db->query("SELECT Categories FROM Articles");
        // $require->execute(array($id));
        $donnees = $require->fetch();
        $article = $donnees['Article'];
        $categories = $donnees['Categories'];
        $prix = $donnees['Prix'];
        $numero = $donnees['Numero'];
        $proprio = $donnees['Proprietaires'];
        $ville = $donnees['Ville'];
        $commune = $donnees['Commune'];
        $image = $donnees['Image'];

        // $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
        
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactez le vendeur</title>
    <script src="JQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="contact.css" type="text/css" />
</head>
<body>
    <div class="formcontain">
        <form action="" method="POST">

            <label for"mail">

            <?php
                $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
                $search=$db->query("SELECT Mail FROM Client WHERE Admin = '$proprio' ");
                $vendeur = $search->fetch();
                $mail = $vendeur['Mail'];
            ?>
                Adresse Mail : <br />
                <input type="email" name="mail" id="mail" value="<?php echo $mail ?>" />
            </label><br />
            
            <!-- cols="30" rows="10" -->

            <label for"message">
                Message : <br />
                <textarea name="message" id="message" ></textarea>
            </label><br />
            
            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Envoyez" />
        </form>
    </div>
</body>
</html>