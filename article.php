<?php 
        session_start();
          if(empty($_SESSION['username']) || !(isset($_SESSION['username']))){
              header("Location: login.php");
          }

          else{
              $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
              $req = $db->query("SELECT * FROM Articles ORDER BY Prix DESC");
              $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' ");
          }
        
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste Des Articles</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="1we/M1/js/tree.js"></script> -->
    <!-- <script type="text/javascript" src="1we/M1/js/lightbox-plus-jquery.min.js"></script> -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="article.css" type="text/css" />
</head>
<body>
    <header>
        <div id="CCI"><img src="CCI.png" alt="" title="Central CI" id="CCILogo" /></div>
        <div id="CCItext"><h3>Central CI</h3></div>
        <div id="searchcontain">
                <!-- <input type="text" name="search" id="search" title="Recherche" placeholder="Recherche" /> -->
        </div>
        <p class="name"><a href="loginsuccess.php"><?php echo $_SESSION['username'] ?></a></p>
        <div class="avatar"><p><img src="CCI.png" alt="" title="Avatar" id="lavatar" /></p></div>
    </header>
    
    <section>
        <div class="add">
            <p><a href="addarticle.php?name=<?php echo $_SESSION['username'] ?>">Ajouter <img src="add.png" alt="" title="Central CI" id="addlogo" /></a></p>
        </div>
        <div class="lister">
            <table class="table table-striped">
                <thead>
                    <tr class="red">
                        <p><th>ID</th></p>
                        <p><th>Articles</th></p>
                        <p><th>Catégories</th></p>
                        <p><th>Prix</th></p>
                        <p><th>Propriétaires</th></p>
                        <p><th>Numéro</th></p>
                        <p><th>Ville</th></p>
                        <p><th>Commune</th></p>
                        <p><th>Plus D'Infos</th></p>
                        <p><th>Envoyez un mail</th></p>
                    </tr>
                </thead>

                <tbody>
                        <?php 
                            while($liste = $req->fetch()){
                        ?>
                    <tr>
                        <td><p><?php echo $liste['ID'] ?></p></td>
                        <td><p><?php echo $liste['Article'] ?></p></td>
                        <td><p><?php echo $liste['Categories'] ?></p></td>
                        <td><p><?php echo $liste['Prix'] ?></p></td>
                        <td><p><?php echo $liste['Proprietaires'] ?></p></td>
                        <td><p><?php echo $liste['Numero'] ?></p></td>
                        <td><p><?php echo $liste['Ville'] ?></p></td>
                        <td><p><?php echo $liste['Commune'] ?></p></td>
                        <td><p><a href="prod.php?ID=<?php echo $liste['ID'] ?>"> Voir </a></p></td>
                        <td><p><a href="contact.php?ID=<?php echo $liste['ID'] ?>"> Envoyez un mail </a></p></td>
                    </tr>
                        
                    <?php
                        }
                    ?>
                </toby>
            </table>

            
        </div>
    <div class="clear"></div>
    </section>
    
    <footer><p>Copyright © Central Côte D'Ivoire -  Tous Droits Reservés</p></footer>
</body>
</html>