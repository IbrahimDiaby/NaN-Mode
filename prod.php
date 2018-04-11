<?php
        session_start();
          if(empty($_SESSION['username']) || !(isset($_SESSION['username']))){
              header("Location: login.php");
          }

          else{
              $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
              $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' ");
              $req = $db->query("SELECT * FROM Articles WHERE ID = '$_GET[ID]'");
          }
        
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caractéristiques Du Produits</title>
    <script src="JQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="prod.css" type="text/css" />
</head>
<body>
    <section>
        
            <?php 
                while($liste = $req->fetch()){
            ?>
                <div class="left" >
                    <div class="imgcontain">
                        <img src="" alt="" title="" class="" />
                    </div>

                    <div class="prix"><span class="btn btn-outline-danger">Prix : <?php echo $liste['Prix'] ?> Francs CFA</span></div>
                
                </div>

                <div class="right" >
                    <div class="infocontain">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td><h3>Article</h3></td>
                                    <td><p class="info"><?php echo $liste['Article'] ?></p></td>
                                </tr>

                                <tr>
                                    <td><h3>Catégories</h3></td>
                                    <td><p class="info"><?php echo $liste['Categories'] ?></p></td>
                                </tr>

                                <tr>
                                    <td><h3>Proprétaires</h3></td>
                                    <td><p class="info"><?php echo $liste['Proprietaires'] ?></p></td>
                                </tr>
                    
                                <tr>
                                    <td><h3>Contact</h3></td>
                                    <td><p class="info"><?php echo $liste['Numero'] ?></p></td>
                                </tr>

                                <tr>
                                    <td><h3>Ville</h3></td>
                                    <td><p class="info"><?php echo $liste['Ville'] ?></p></td>
                                </tr>
                    
                                <tr>
                                    <td><h3>Commune</h3></td>
                                    <td><p class="info"><?php echo $liste['Commune'] ?></p></td>
                                </tr>

                                <tr>
                                    <td><p><a href="article.php" class="btn btn-outline-danger">Retour</a></p></td>
                                    <td><p><a href="article.php" class="btn btn-outline-success">Tous les articles</a></p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
                }
            ?>
            
    </section>
</body>
</html>