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
        
        $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
        $savemsg = $db->prepare("INSERT INTO Messages(NameDestinateur, Destinateur, NameExpediteur, Expediteur, Message) VALUES(?, ?, ?, ?, ?)");
        $savemsg->execute(array(verify($_POST['namedestinateur']), verify($_POST['maildestinateur']), verify($_POST['nameexpediteur']), verify($_POST['mailexpediteur']), verify($_POST['message'])));
        header("Location: loginsuccess.php");
    }
    


?>