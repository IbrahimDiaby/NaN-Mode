<?php
    session_start();
    $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
    $req=$db->query("SELECT * FROM Client WHERE Admin = '$_SESSION[username]'");
    $db->exec("UPDATE Client SET Connected = '0' WHERE Admin = '$_SESSION[username]'");
   if(session_destroy()) {
      header("Location: login.php");
   }
?>
