<?php

          session_start();
          if(empty($_SESSION['username']) || !(isset($_SESSION['username']))){
              header("Location: login.php");
          }
          
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
            $req = $db->prepare("UPDATE Articles SET Image = ?, Article = ?, Categories = ?, Prix = ?, Proprietaires = ?, Numero = ?, Ville = ?, Commune = ? WHERE ID = ?");
            $req->execute(array($lien, verify($_POST['article']), verify($_POST['categories']), verify($_POST['prix']), verify($_POST['admin']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune']), $id));
            header("Location: mesarticles.php?name=$_SESSION[username]");

            // $req = $db->prepare("INSERT Articles SET Image = ?, Article = ?, Categories = ?, Prix = ?, Proprietaires = ?, Numero = ?, Ville = ?, Commune = ? WHERE ID = ?");
            // $req->execute(array($lien, verify($_POST['article']), verify($_POST['categories']), verify($_POST['prix']), verify($_POST['admin']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune']), $id));

            // $updated=$require->fetch();

            header("Location: mesarticles.php?name=$_SESSION[username]");

?>