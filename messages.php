<?php
    session_start();
    if(empty($_SESSION['username']) || !(isset($_SESSION['username']))){
        header("Location: login.php");
    }

    else{
        $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
        $requete = $db->query("SELECT * FROM Messages WHERE NameDestinateur = '$_SESSION[username]' ");
    }
    

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ma Messagerie</title>
    <script src="JQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="messages.css" type="text/css" />
    
</head>
<body>

    <section>
        <center>
            <div class="container">
            <!-- btn btn-danger -->
                <div id="title">
                    <div class="btn btn-primary" id="text_title">Ma Messagerie</div>
                </div>

                <a class="btn btn-outline-danger" id="accueil" href="loginsuccess.php">Accueil</a>
                <div id="title">
                    <div class="btn btn-primary" id="text_subject1">Vous a écrit</div>
                    <div class="btn btn-primary" id="text_subject2">Messages</div>
                </div>
                

                <?php
                    // $count = 1;
                    while($liste = $requete->fetch()){
                ?>
                    <div class="contain">
                        <div class="expediteur">
                            <p class="nameexpediteur"><?php echo $liste['NameExpediteur']; ?></p>
                        </div>
                        
                        <div class="message">
                            <p><?php echo $liste['Message']; ?></p>
                        </div>
                    </div>
                        
                <?php
                        // $count++;
                    }
                ?>
            </div>
        </center>
    </section>
</body>
</html>