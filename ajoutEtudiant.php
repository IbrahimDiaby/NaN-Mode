
<?php
    
    require_once ('verifier3.php');

?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">GESTION NaN</a>
        </li>
        <li class="breadcrumb-item active">Ajout d'un étudiant</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="card mb-3">
          <canvas id="" width="100%" height="10"></canvas>

<?php
    
    require 'database.php';
 
    $nomError = $prenomError = $ageError = $emailError = $communeError = $activiteError = $activite = $ContactError = $nomEqError = $nomGroupError = $nom = $prenom = $age = $email = $commune = $equipes = $Contacts = $imageError = $image = $nomEq = "";

    if(!empty($_POST)) 
    {
        $noms     = checkInput($_POST['nom']);
        $prenoms  = checkInput($_POST['prenom']);
        $Contacte = checkInput($_POST['Contacts']);
        $ages     = checkInput($_POST['age']);
        $emails   = checkInput($_POST['email']); 
        $activite = checkInput($_POST['activite']); 
        $communes = checkInput($_POST['commune']); 
        $equipe= checkInput($_POST['nomEq']);
         $nomGroups    = checkInput($_POST['nomGroup']); 
         $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isUploadSuccess    = false;


        $isSuccess = true;
  
        
        if(empty($noms)) 
        {
            $nomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($prenoms)) 
        {
            $prenomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($ages)) 
        {
            $ageError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($Contacte)) 
        {
            $communeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(!filter_var($emails, FILTER_VALIDATE_EMAIL)) 
        {
            $emailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($activite)) 
        {
            $activiteError= 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($communes)) 
        {
            $communeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($nomGroups)) 
        {
            $nomGroupError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }


        if(empty($equipe)) 
        {
            $nomEqError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($image)) 
        {
            $imageError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }



       

        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO etudiants (`ID_ETUDIANT`, `NOM`, `PRENOM`, `CONTACT`, `AGE`, `EMAIL`,`ACTIVITE`,`IMAGE`, `NB_LIKE`, `NB_DISLIKE`, `ID_LOCALISATION`, `ID_EQUIPE`, `ID_GROUPE`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?);");
            $statement->execute(array('',$noms,$prenoms,$Contacte,$ages,$emails,$activite,$image,'0','0',$communes,$equipe,$nomGroups));
            Database::disconnect();
            
        }
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>



   
         <div class="container admin">
            <div class="row">
             
                <br>
                <form class="form" action="ajoutEtudiant.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" value="<?php echo $nom;?>">
                        <span class="help-inline"><?php echo $nomError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" value="<?php echo $prenom;?>">
                        <span class="help-inline"><?php echo $prenomError;?></span>
                    </div>

                    <div class="form-group">
                        <label for="Contacts">Contact:</label>
                        <input type="phone" class="form-control" id="Contacts" name="Contacts" placeholder="Contacts" value="<?php echo $Contacts;?>">
                        <span class="help-inline"><?php echo $ContactError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo $age;?>">
                        <span class="help-inline"><?php echo $ageError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $email;?>">
                        <span class="help-inline"><?php echo $emailError;?></span>
                    </div>

                    <div class="form-group">
                        <label for="activite">Activité:</label>
                        <input type="text" class="form-control" id="activite" name="activite" placeholder="activite" value="<?php echo $activite;?>">
                        <span class="help-inline"><?php echo $activiteError;?></span>
                    </div>


                    <div class="form-group">
                        <label for="commune">Commune:</label>
                        <select class="form-control" id="commune" name="commune">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM localisation') as $row) 
                           {
                                echo '<option value="'. $row['ID_LOCALISATION'] .'">'. $row['COMMUNE'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <span class="help-inline"><?php echo $communeError;?></span>
                    </div>


                    <div class="form-group">
                        <label for="nomEq">Equipe:</label>
                        <select class="form-control" id="nomEq" name="nomEq">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM equipe WHERE ID_EQUIP = 1 OR ID_EQUIP = 2') as $row) 
                           {
                                echo '<option value="'. $row['ID_EQUIP'] .'">'. $row['NOM_EQUIPE'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <span class="help-inline"><?php echo $nomEqError;?></span>
                    </div>

                    <div class="form-group">
                        <label for="nomGroup">Groupe:</label>
                        <select class="form-control" id="nomGroup" name="nomGroup">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM groupe') as $row) 
                           {
                                echo '<option value="'. $row['ID_GROUP'] .'">'. $row['NOM_GROUPE'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <span class="help-inline"><?php echo $nomGroupError;?></span>
                    </div>

                    <div class="form-group">
                        <label for="image">Sélectionner une image:</label>
                        <input type="file" id="image" name="image"> 
                        <span class="help-inline"><?php echo $imageError;?></span>
                    </div>

                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="afficheEtudiant.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
            </div>
        </div>   
  

        </div>
       
      </div>
    </div>


<?php

  include('menu.php');
?>