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

                function checkInput($data) 
                {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
                }
            }

//             if(!empty($_POST)) 
//     {
//             $image              = $_FILES['image']['name'];
//             $imagePath          = "imagesUP/";
//             $imageExtension     = pathinfo($imagePath.$image,PATHINFO_EXTENSION);
//             $isSuccess          = true;

//             if(!empty($image)) 
//         {
           
//             // $isSuccess = false;
//             $isUploadSuccess = true;
//             if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
//             {
//                 $imageError = "Les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
//                 $isUploadSuccess = false;
//             }
//            /* if(file_exists($imagePath.$image)) 
//             {
//                 $imageError = "L'image existe déja";
//                 $isUploadSuccess = false;
//             }*/
//             // if(isset($_FILES['image']) ) 
//             // {
//                 // $imageError = "Le fichier ne doit pas depasser les 500KB";
// /*                $isUploadSuccess = false;
// */              $tmp_name = $_FILES['image']['tmp_name'];
//                 move_uploaded_file($tmp_name, $imagePath.$image) ;
//             // }
//         }

//         else
//         {
//               $isUploadSuccess = true;
//         }
        
//         // if($isSuccess && $isUploadSuccess) 
//         // if($isSuccess)
//         // {
//                 // $lien = verify($_POST['image']);
//                 $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
//                 $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' ");
//                 $req = $db->prepare("INSERT INTO Articles(Image, Article, Categories, Prix, Proprietaires, Numero, Ville, Commune) VALUES(?, ?, ?,?,?,?,?,?)");
//                 $req->execute(array($image, verify($_POST['article']), verify($_POST['categories']), verify($_POST['prix']), verify($_POST['admin']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune'])));
//                // header("Location: mesarticles.php?name=$_SESSION[username]");
//             // header("Location: index.php?menu=equipez");
//         // }
    // }


            if(verify(!empty(isset($_POST['article'])))){
                $lien = verify($_POST['image']);
                $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
                $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' ");
                $req = $db->prepare("INSERT INTO Articles(Image, Article, Categories, Prix, Proprietaires, Numero, Ville, Commune) VALUES(?, ?, ?,?,?,?,?,?)");
                $req->execute(array($lien, verify($_POST['article']), verify($_POST['categories']), verify($_POST['prix']), verify($_POST['admin']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune'])));
                header("Location: mesarticles.php?name=$_SESSION[username]");
            }
        }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un article</title>
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
            <form action="addarticle.php" method="POST">
                <label for="article">
                    Article:
                    <br />
                    <input type="text" name="article" id="article" placeholder="Nom De L'Article" required />
                </label>

                <label for="categories">Catégories : <br />
                    <select name="categories" id="categories">
                            <option value="Vetements">Vêtements</option>
                            <option value="Montres">Montres</option>
                            <option value="Chaussures">Chaussures</option>
                            <option value="Lunettes">Lunettes</option>
                            <option value="Sous_Vet">Sous Vêtements</option>
                            <option value="Pull">Pull</option>
                            <option value="Chapeau">Chapeau</option>
                            <option value="Jeans">Jeans</option>
                            <option value="Pretaporter">Prêt Â Porter</option>
                       </select>
                </label>
                
                <label for="prix">
                    Prix (en Francs cfa):
                    <br />
                    <input type="text" name="prix" id="prix" placeholder="Prix" required/>
                </label>
                <br />

                <label for="number">
                    Numero:
                    <br />
                    <input type="text" name="number" id="number" placeholder="Téléphone" required/>
                </label>
                <br />

                <label for="ville">
                    Ville:
                    <br />
                    <input type="text" name="ville" id="ville" placeholder="Ville" required/>
                </label>
                <br />

                <label for="commune">
                    Commune:
                    <br />
                    <input type="text" name="commune" id="commune" placeholder="Commune" required/>
                </label>
                <br />

                <label for="admin">Propriétaire : <br />
                    <select name="admin" id="admin">
                            <option value="<?php echo $_SESSION['username'] ?>"><?php echo $_SESSION['username'] ?></option>
                    </select>
                </label>
                <br />

                <label for="image">
                    Image de l'article :
                    <br />
                    <input type="file" name="image" id="image"  placeholder="Avatar" required />
                </label>
                <br />

                <input class="btn btn-outline-success" type="submit" value="Enregistrer">
                <input class="btn btn-outline-danger" type="reset" value="Annuler">
                
            </form>
        </aside>
    </section>
    <footer><p>Copyright © Central Côte D'Ivoire -  Tous Droits Reservés</p></footer>
</body>
</html>