<?php
    function verify($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    if(isset($_POST['admin']) && isset($_POST['password'])){
        if(!empty($_POST['admin']) && !empty($_POST['password'])){
            $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
            $req=$db->prepare("SELECT * FROM Client WHERE Admin = ? AND Password = ?");
            $req->execute(array(verify($_POST['admin']), verify($_POST['password'])));

            $usersHasBeenFound = $req->rowCount();
            if($usersHasBeenFound){
                $user = $req->fetch(PDO::FETCH_OBJ);
                session_start();
                $_SESSION['ID'] = $user->ID;
                $ID = $_SESSION['ID'];
                $_SESSION['username'] = $user->Admin;
                $_SESSION['profile'] = $user->Avatar;

                $db->exec("UPDATE Client SET Connected = '1' WHERE ID = $ID");
            }

            if($usersHasBeenFound){
                header('Location: loginsuccess.php');
            }

            else{
                echo "Login Or Password Incorrecte";
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
    <title>Client Area</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet">
    <link rel="stylesheet" href="login.css" type="text/css" />
</head>
<body>
    <header>
            <div id="CCI"><img src="CCI.png" alt="" title="Central CI" id="CCILogo" /></div>
            <div id="CCItext"><h3>Central CI</h3></div>
            <div id="searchcontain">
                    <!-- <input type="text" name="search" id="search" title="Recherche" placeholder="Recherche" /> -->
            </div>
            <div class="Inscription"><a href="new.php" class="btn btn-outline-success">Inscription</a></div>
    </header>
    <section>
        <form action="" method="POST">
            <label for="admin">
                <input type="text" name="admin" id="admin" placeholder="Admin" required //>
                <br />
            </label>
                                            
            <label for="password">
                <input type="password" name="password" id="password" placeholder="Mot De Passe" required />
                    <br />
                </label>
                                    
            <label for="submit">
                <input type="submit" class="btn btn-outline-success" value="Connexion" />
            </label>
        </form>

        <p><a href="reset.php">Mot De Passe Oublié?</a><p>
    </section>

    <footer><p>Copyright © Central Côte D'Ivoire -  Tous Droits Reservés</p></footer>
</body>
</html>