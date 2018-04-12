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

            if(!empty($_POST)){
                $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');          
                $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' ");
          
              function verify($data){
                $data = trim($data);
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                return $data;
            }

            $id = verify($_GET['ID']);
            $lien = verify($_POST['image']);
            $req = $db->prepare("UPDATE Articles SET Article = ?, Categories = ?, Prix = ?, Proprietaires = ?, Numero = ?, Ville = ?, Commune = ? WHERE ID = ?");
            $req->execute(array(verify($_POST['article']), verify($_POST['categories']), verify($_POST['prix']), verify($_POST['admin']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune']), $id));

            // si on decide de mettre une nouvelle image
            // $req = $db->prepare("UPDATE Articles SET Image = ?, Article = ?, Categories = ?, Prix = ?, Proprietaires = ?, Numero = ?, Ville = ?, Commune = ? WHERE ID = ?");
            // $req->execute(array($lien, verify($_POST['article']), verify($_POST['categories']), verify($_POST['prix']), verify($_POST['admin']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune']), $id));
            header("Location: mesarticles.php?name=$_SESSION[username]");

            // $req = $db->prepare("INSERT Articles SET Image = ?, Article = ?, Categories = ?, Prix = ?, Proprietaires = ?, Numero = ?, Ville = ?, Commune = ? WHERE ID = ?");
            // $req->execute(array($lien, verify($_POST['article']), verify($_POST['categories']), verify($_POST['prix']), verify($_POST['admin']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune']), $id));

            // $updated=$require->fetch();

            header("Location: update.php?ID=$id ?>");
            }
            
            else{
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
                $ville = $donnees['Ville'];
                $commune = $donnees['Commune'];
                $image = $donnees['Image'];
        
            }
            
            
            $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' ");



            // $req = $db->prepare("INSERT Articles SET Image = ?, Article = ?, Categories = ?, Prix = ?, Proprietaires = ?, Numero = ?, Ville = ?, Commune = ? WHERE ID = ?");
            // $req->execute(array($lien, verify($_POST['article']), verify($_POST['categories']), verify($_POST['prix']), verify($_POST['admin']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune']), $id));

            // $updated=$require->fetch();

            
        //     if(verify(!empty(isset($_POST['article'])))){
        //         $lien = verify($_POST['image']);
        //         // $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
        //         $req = $db->prepare("UPDATE Articles SET Image = ?, Article = ?, Categories = ?, Prix = ?, Proprietaires = ?, Numero = ?, Ville = ?, Commune = ? WHERE ID = ?");
        //         $req->execute(array($lien, verify($_POST['article']), verify($_POST['categories']), verify($_POST['prix']), verify($_POST['admin']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune']), $id));
        //         header("Location: mesarticles.php?name=$_SESSION[username]");
        //     }
          }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier un article</title>
    <link rel="stylesheet" href="1we/M1/css/first.css">
    <link rel="stylesheet" href="1we/M1/css/second.css">
    <link rel="stylesheet" href="1we/M1/css/lightbox.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="JQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="M1/css/tree.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="1we/M1/js/tree.js"></script>
    <script type="text/javascript" src="1we/M1/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="addarticle.css" type="text/css" />
</head>
<body>
    <header>
            <div id="CCI"><img src="CCI.png" alt="" title="Central CI" id="CCILogo" /></div>
            <div id="CCItext"><h3>Central CI</h3></div>
            <div id="searchcontain">
                    <!-- <input type="text" name="search" id="search" title="Recherche" placeholder="Recherche" /> -->
            </div>
            <div class="Connect"><a href="loginsuccess.php" class="btn btn-outline-success"><?php echo $_SESSION['username'] ?></a></div>
    </header>

    <section>
        <aside class="left">
            <div class="affiche">
                
            </div>

            <div class="content-all">
            <div class="content-carrousel">
                    
                </div>
            </div>

            
            <script src="jquery-3.2.1.js"></script>
        <script>
            $(document).ready(function(){
                for(var i = 1 ; i<11; i++){
                    $("<a>"+"<img class='img' src='1we/M1/images/"+[i]+".jpg'"+" />").appendTo($(".content-carrousel"));
                }
                $("img").click(function() {

                    //faire apparaitre le lightbox
                    $src = $(this).attr("src");
                    if (!$("#light-box").length > 0) {
                        // append prepend
                    $(".affiche").prepend("<div id='light-box'><span class='material-icons'>close</span><img src=''></div>");
                    $("#light-box").show();
                    $("#light-box img").attr("src", $src);
                    } else {
                    $("#light-box").show();
                    $("#light-box img").attr("src", $src);
                    }
                });
                
                $("body").on("click", "#light-box span", function() {
                    $("#light-box").hide();
                });
                
                var imgPreview = $("#imgpreview");
                $("#imgupload").on("change", function(){
                        
                });
            });
            
        </script>
        </aside>

        <aside class="right">
        <!-- updateconfirm.php?ID=<?php echo $id ?> -->
            <form action="updateconfirm.php?ID=<?php echo $id ?>" method="POST">
                <label for="article">
                    Article:
                    <br />
                    <input type="text" name="article" id="article" placeholder="Nom De L'Article" value ="<?php echo $article ?>" required />
                </label>

                <label for="categories">Catégories : <br />
                    <select name="categories" id="categories">
                        <?php 
                            while($tester = $test->fetch()){
                                foreach($db->query("SELECT Categorie FROM Categories") as $row){
                                    if($row['Categorie'] == $categories){
                                        
                                        echo '<option selected="selected" value="' . $row['Categorie'] . '">' . $row['Categorie'] . '</option>';
                                    }
    
                                    else{
                                        echo '<option value="' . $row['Categorie'] . '">' .$row['Categorie'] . '</option>';
                                    }
                                }
                            }
                        
                        ?>
                    </select>
                </label>
               
                
                <label for="prix">
                    Prix (en Francs cfa):
                    <br />
                    <input type="text" name="prix" id="prix" placeholder="Prix" value ="<?php echo $prix ?>" required/>
                </label>
                <br />

                <label for="number">
                    Numero:
                    <br />
                    <input type="text" name="number" id="number" placeholder="Téléphone" value ="<?php echo $numero ?>" required/>
                </label>
                <br />

                <label for="ville">
                    Ville:
                    <br />
                    <input type="text" name="ville" id="ville" placeholder="Ville" value ="<?php echo $ville ?>" required/>
                </label>
                <br />

                <label for="commune">
                    Commune:
                    <br />
                    <input type="text" name="commune" id="commune" placeholder="Commune" value ="<?php echo $commune ?>" required/>
                </label>
                <br />

                <label for="admin">Propriétaire : <br />
                    <select name="admin" id="admin">
                            <option value="<?php echo $_SESSION['username'] ?>"><?php echo $_SESSION['username'] ?></option>
                    </select>
                </label>
                <br />

                <label for="imageex">
                    Image : <?php echo $image ?>
                </label>
                <br />

                <!-- <label for="image">
                    Nouvel image de l'article :
                    <br />
                    <input type="file" name="image" id="image"  placeholder="Avatar" required />
                </label> -->
                <br />

                <input class="btn btn-outline-success" type="submit" value="Enregistrer">
                <input class="btn btn-outline-danger" type="reset" value="Annuler">
                
            </form>
        </aside>
    </section>
    <footer><p>Copyright © Central Côte D'Ivoire -  Tous Droits Reservés</p></footer>
</body>
</html>