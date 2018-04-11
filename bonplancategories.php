<?php 
        session_start();
          if(empty($_SESSION['username']) || !(isset($_SESSION['username']))){
              header("Location: login.php");
          }

          else{
              $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
              $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' ");
              $req1 = $db->query("SELECT Categories FROM Articles WHERE Categories = Vetements");
              $req2 = $db->query("SELECT Categories FROM Articles WHERE Categories = Montres");
              $req3 = $db->query("SELECT Categories FROM Articles WHERE Categories = Chaussures");
              $req4 = $db->query("SELECT Categories FROM Articles WHERE Categories = Lunettes");
              $req5 = $db->query("SELECT Categories FROM Articles WHERE Categories = Sous_Vet");
              $req6 = $db->query("SELECT Categories FROM Articles WHERE Categories = Pull");
              $req7 = $db->query("SELECT Categories FROM Articles WHERE Categories = Chapeau");
              $req8 = $db->query("SELECT Categories FROM Articles WHERE Categories = Jeans");
              $req9 = $db->query("SELECT Categories FROM Articles WHERE Categories = Pretaporter");
          }
        
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Central Côte D'Ivoire</title>
    <link rel="stylesheet" href="1we/M1/css/first.css">
    <link rel="stylesheet" href="1we/M1/css/second.css">
    <link rel="stylesheet" href="1we/M1/css/lightbox.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="M1/css/tree.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="1we/M1/js/tree.js"></script>
    <script type="text/javascript" src="1we/M1/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
    <script src="JQuery/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet">
    <link rel="stylesheet" href="bonplancategories.css" type="text/css" />
    <script src="bonplancategories.js"></script>
</head>
<body>
    <header>
        <div id="CCI"><img src="CCI.png" alt="" title="Central CI" id="CCILogo" /></div>
        <div id="CCItext"><h3>Central CI</h3></div>
        <div id="searchcontain">
                <!-- <input type="text" name="search" id="search" title="Recherche" placeholder="Recherche" /> -->
        </div>
        <div class="logout"><a href="logout.php" class="btn btn-outline-danger">Déconnexion<img src="logout.png" alt="" title="Déconnexion" id="logouticon" /></a></div>
    </header>

    <section>
        <aside class="left">
            <!-- <div class="subject"><h1>Catégories<img src="arrowdown.png" alt="" title="" id="arrowdown" /></h1></div>
            <div class="sub_subject"><h4><a href="#">Vêtements</a><img src="vet.png" alt="" title="" id="vet" /><img src="dress.png" alt="" title="" id="vet" /></h4></div>
            <div class="sub_subject"><h4><a href="#">Sous-Vêtements</a><img src="boxer.png" alt="" title="" id="sousvet" /><img src="sousvetf.png" alt="" title="" id="sousvet" /></h4></div>
            <div class="sub_subject"><h4><a href="#">Montres</a><img src="montres.png" alt="" title="" id="montres" /></h4></div>
            <div class="sub_subject"><h4><a href="#">Chaussures</a><img src="chaussures.png" alt="" title="" id="chaussures" /></h4></div>
            <div class="sub_subject"><h4><a href="#">Lunettes</a><img src="lunettes.png" alt="" title="" id="lunettes" /></h4></div>
            <div class="sub_subject"><h4><a href="#">Pull</a><img src="pull.png" alt="" title="" id="pull" /></h4></div>
            <div class="sub_subject"><h4><a href="#">Chapeau</a><img src="chapeau.png" alt="" title="" id="chapeau" /></h4></div>
            <div class="sub_subject"><h4><a href="#">Jeans</a><img src="jeans.png" alt="" title="" id="jeans" /></h4></div>
            <div class="sub_subject"><h4><a href="#">Prêts à porter</a><img src="pretaporter.png" alt="" title="" id="pretaporter" /></h4></div>
            <div class="sub_subject"><h4><a href="#">Paramètres</a><img src="set.png" alt="" title="" id="parameter" /></h4></div>
            
            <div class="showhidesocial">
                    <p><img src="hide.png" alt="" title="" id="arrow" />Réseaux Sociaux</p>
            </div>

            <div class="social">
                <div class="socialsite"></div>
                <div class="socialsite"></div>
                <div class="socialsite"></div>
                <div class="socialsite"></div>
                <div class="socialsite"></div>
            </div> -->
            <h3 class="h3">Nos Pages</h3>
            <div class="social">
                <ul>
                    <li><a href="#" target="_blank"><img src="Images/facebook.svg" alt="facebook" title="Facebook" class="facebook"/></li></a>
                    <li><a href="#" target="_blank"><img src="Images/discord.svg" alt="discord" title="Discord" class="discord"/></li></a>
                    <li><a href="#" target="_blank"><img src="Images/blog.svg" alt="blog" title="Blog" class="blog"/></li></a>
                    <li><a href="#" target="_blank"><img src="Images/github.svg" alt="github" title="Github" class="github"/></li></a>
                </ul>
            </div>

            <div class="proverbemode">
                <h5>Proverbe Mode Du Jour <img src="delete.png" alt="" title="" id="delete" /></h5>
                <p></p>
            </div>
        </aside>
        
        <aside class="center">
            <video controls src="Ed Sheeran - Thinking Out Loud [Official Video].mp4">
                    <!-- autoplay loop -->
                <!-- <source src="Ed Sheeran - Thinking Out Loud [Official Video]"> -->
            </video>

            <div class="describe">
                <h2>Bienvenue sur l'un des meilleurs sites de ventes de vos marchandises en Côte D'Ivoire</h2>
            </div>

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
            <div class="pub">
                Espace Pub
            </div>

            <div class="pub">
                Espace Pub
            </div>
            <div class="pub">
                Espace Pub
            </div>
            <div class="pub">
                Espace Pub
            </div>
            <div class="pub">
                Espace Pub
            </div>
            <div class="pub">
                Espace Pub
            </div>
            <div class="pub">
                Espace Pub
            </div>
            <div class="pub">
                Espace Pub
            </div>
            <div class="pub">
                Espace Pub
            </div>
        </aside>
    </section>

    <footer><p>Copyright © Central Côte D'Ivoire -  Tous Droits Reservés</p></footer>
</body>
</html>