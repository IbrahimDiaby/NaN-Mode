<?php

    $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');

    if(isset($_POST['username']) && isset($_POST['password'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $req=$db->prepare("SELECT * FROM Client WHERE Admin = ? AND Password = ?");
            $req->execute(array($_POST['username'], $_POST['password']));

            $usersHasBeenFound = $req->rowCount();
            if($usersHasBeenFound){
                $user = $req->fetch(PDO::FETCH_OBJ);

                session_start();
                $_SESSION['ID'] = $user->ID;
                $ID = $_SESSION['ID'];
                $_SESSION['username'] = $user->Admin;
                $_SESSION['name'] = $user->Admin;

                $db->exec("UPDATE Client SET Connected = '1' WHERE ID = $ID");
            }

            if($usersHasBeenFound){
                header('Location: loginsuccess.php');
            }

            else{
                // echo "Login Or Password Incorrecte";
                header('Location: login.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="1we/M1/js/lightbox-plus-jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="reset.css" type="text/css" />
</head>
<body>
    
    <header>
            <div id="CCI"><img src="CCI.png" alt="" title="Central CI" id="CCILogo" /></div>
            <div id="CCItext"><h3>Central CI</h3></div>
            <div id="searchcontain">
                    <!-- <input type="text" name="search" id="search" title="Recherche" placeholder="Recherche" /> -->
            </div>
            <div class="Inscription"><a href="login.html" class="btn btn-outline-success">Login</a></div>
    </header>
    
    <section>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="password">
                    <input type="password" name="password" id="password" placeholder="Nouveau Mot De Passe" required />
                        <br />
                </label>
                                    
            <label for="submit">
                <input type="submit" class="btn btn-outline-success" value="Connexion" />
            </label>
        </form>
    </section>
    
    <footer><p>Copyright © Central Côte D'Ivoire -  Tous Droits Reservés</p></footer>

</body>
</html>