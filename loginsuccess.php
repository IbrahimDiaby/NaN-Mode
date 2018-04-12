<?php
          session_start();
          if(empty($_SESSION['username']) || !(isset($_SESSION['username']))){
              header("Location: login.php");
          }

          else{
              $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
              $profile=$db->query("SELECT Avatar FROM Client WHERE Admin = '$_SESSION[username]' ");

              $image = $_FILES['image']['name'];
              $imagePath = '../images/' . basename($image);
              $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
          }
          
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Central Mode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <script src="JQuery/jquery-3.3.1.min.js.js"></script> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="loginsuccessheader.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="loginsuccesssection.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="loginsuccessfooter.css" />
    <script src="loginsuccessindex.js"></script>
</head>

<body>
    <header>
            <div id="CCI"><img src="CCI.png" alt="" title="Central CI" id="CCILogo" /></div>
            <div id="CCItext"><h3>Central CI</h3></div>
            <div id="searchcontain">
                    <!-- <input type="text" name="search" id="search" title="Recherche" placeholder="Recherche" /> -->
            </div>
            <p class="name"><?php echo $_SESSION['username'] ?></p>
            <div class="avatar"><p>
              <?php 
                    while($image = $profile->fetch()){
              ?>
                      <img width="60" height="60" src="<?php echo $image['Avatar']; ?>" alt="" title="Avatar" id="lavatar" />
              <?php
                  } 
              ?>
            </p></div>
    </header>
    
    <section>

        <div class="alert">
            <div class="alertblock"><p>Flash Alerte</p></div>
            <div class="past">
                <marquee>Retrouvez-ici les meilleurs de nos bons plans. <a href="bonplancategories.php">Cliquez-ici</a></marquee>
            </div>
          </div>
          
        <nav>
            <ul>
                <li><a href="categories.php?categories=<?php echo Vetements ?>">Vêtements <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                <li><a href="categories.php?categories=<?php echo Montres ?>">Montres <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                <li><a href="categories.php?categories=<?php echo Chaussures ?>">Chaussures <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                <li><a href="categories.php?categories=<?php echo Lunettes ?>">Lunettes <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                <li><a href="categories.php?categories=<?php echo Sous_Vet ?>">Sous-Vêt... <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                <li><a href="categories.php?categories=<?php echo Pull ?>">Pull <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                <li><a href="categories.php?categories=<?php echo Chapeau ?>">Chapeau <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                <li><a href="categories.php?categories=<?php echo Jeans ?>">Jeans <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                <li><a href="categories.php?categories=<?php echo Pretaporter ?>">Prêt à porter <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                <li><a href="#">Paramètres <img src="logout.png" alt="" class="logout" title="Logout" /></a>
                    <ul>
                      <li><a href="article.php">Tous les articles disponibles</a></li>
                      <li><a href="mesarticles.php?name=<?php echo $_SESSION['username'] ?>">La Liste De Mes Articles <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
                      <li><a href="addarticle.php?name=<?php echo $_SESSION['username'] ?>">Ajouter un nouvel article</a></li>
                      <li><a href="messages.php?name=<?php echo $_SESSION['username'] ?>">Ma Messagerie</a></li>
                      <li>Modifier les paramètres du compte</li>
                    </ul>
                </li>

                <li><a href="logout.php">Déconnexion <img src="logout.png" alt="" class="logout" title="Logout" /></a></li>
            </ul>
        </nav>

        <article>

        <!-- Slideshow container -->
    <div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <div class="numbertext">1 / 12</div>
      <img src="Images/NaN.png" class="img" />
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">2 / 12</div>
      <img src="Images/hello.jpg" class="img" />
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">3 / 12</div>
      <img src="Images/abidjan.png" class="img" />
    </div>

    <div class="mySlides fade">
            <div class="numbertext">4 / 12</div>
            <img src="CCI.png" class="img" />
          </div>
        
          <div class="mySlides fade">
            <div class="numbertext">5 / 12</div>
            <img src="africa.png" class="img" />
          </div>
        
          <div class="mySlides fade">
            <div class="numbertext">6 / 12</div>
            <img src="Master ID.png" class="img" />
          </div>

          <div class="mySlides fade">
                <div class="numbertext">7 / 12</div>
                <img src="Code Room.png" class="img" />
              </div>
            
              <div class="mySlides fade">
                <div class="numbertext">8 / 12</div>
                <img src="" class="img" />
              </div>
            
              <div class="mySlides fade">
                <div class="numbertext">9 / 12</div>
                <img src="" class="img" />
              </div>

              <div class="mySlides fade">
                    <div class="numbertext">10 / 12</div>
                    <img src="" class="img" />
              </div>

              <div class="mySlides fade">
                <div class="numbertext">11 / 12</div>
                <img src="" class="img" />
              </div>

              <div class="mySlides fade">
            <div class="numbertext">12 / 12</div>
            <img src="" class="img" />
              </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div class="dotcontain" style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span> 
    <span class="dot" onclick="currentSlide(5)"></span> 
    <span class="dot" onclick="currentSlide(6)"></span> 
    <span class="dot" onclick="currentSlide(7)"></span> 
    <span class="dot" onclick="currentSlide(8)"></span> 
    <span class="dot" onclick="currentSlide(9)"></span> 
    <span class="dot" onclick="currentSlide(10)"></span> 
    <span class="dot" onclick="currentSlide(11)"></span> 
    <span class="dot" onclick="currentSlide(12)"></span> 
  </div>
        </article>

        <div class="social">
                <ul>
                    <li><a href="#" target="_blank"><img src="Images/facebook.svg" alt="facebook" title="Facebook" class="facebook"/></li></a>
                    <li><a href="#" target="_blank"><img src="Images/discord.svg" alt="discord" title="Discord" class="discord"/></li></a>
                    <li><a href="#" target="_blank"><img src="Images/blog.svg" alt="blog" title="Blog" class="blog"/></li></a>
                    <li><a href="#" target="_blank"><img src="Images/github.svg" alt="github" title="Github" class="github"/></li></a>
                </ul>
        </div>
    </section>

    <footer>
        <p>Copyright © Central Côte D'Ivoire - Tous droits réservés</p>
    </footer>
</body>
</html>