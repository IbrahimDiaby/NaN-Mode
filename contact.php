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
        <form action="contactconfirm.php" method="POST">

            <div class="page">
                <a class="btn btn-danger" id="accueil" href="loginsuccess.php">Accueil</a>
            </div>
            
            <?php
                $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
                $see=$db->query("SELECT * FROM Client WHERE Admin = '$_SESSION[username]' ");
                $admin = $see->fetch();
                $adminmail = $admin['Mail'];
                $adminname = $admin['Admin'];

                // $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
                $search=$db->query("SELECT * FROM Client WHERE Admin = '$proprio' ");
                $vendeur = $search->fetch();
                $mail = $vendeur['Mail'];
                $name = $vendeur['Admin'];
            ?>

            <label for="">
                <p>Message de <span class="btn btn-primary"><?php echo $_SESSION['username']  ?></span> à <span class="btn btn-success"><?php echo $name ?></span> </p>
            </label>

            <label for="mailexpediteur">

                Adresse Mail De @ <p class="btn btn-primary"><?php echo $_SESSION['username']  ?></p> : <br />
                <!-- disabled -->
                <input type="hidden" name="mailexpediteur" id="mailexpediteur" value="<?php echo $adminmail ?>" />
                <input type="email" name="" id="" value="<?php echo $adminmail ?>" disabled />
            </label><br />

            <label for="maildestinateur">
                
                Adresse Mail De @ <p class="btn btn-success"><?php echo $name ?></p> : <br />
                <!-- disabled / enabled -->
                <input type="hidden" name="maildestinateur" id="maildestinateur" value="<?php echo $mail ?>" />
                <input type="email" name="" id="" value="<?php echo $mail ?>" disabled />
            </label><br />

            <!-- <label for="namedestinateur"> -->
                <input type="hidden" name="namedestinateur" id="namedestinateur" value="<?php echo $name ?>" />
            <!-- </label><br /> -->

            <!-- <label for="nameexpediteur"> -->
                <input type="hidden" name="nameexpediteur" id="nameexpediteur" value="<?php echo $adminname ?>" />
            <!-- </label><br /> -->
            
            <!-- cols="30" rows="10" -->

            <label for="message">
                Message : <br />
                <textarea name="message" id="message" ></textarea>
            </label><br />
            
            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Envoyez" />
        </form>
    </div>
</body>
</html>