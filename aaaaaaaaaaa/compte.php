
<?php 

require 'database.php';
 session_start();
  if(!(isset($_SESSION['niv'])))
  {
    header("location:login.php");
  
  }
  if ($_SESSION['niv'] > 1)
    {
        header("location:login.php");
        
    }
   if(!empty($_GET['name'])) 
                 {
                         $id = checkInput($_GET['name']);
                 }

    $loginError = $passError = $nivError = $statutError = $imageError = $login = $pass = $niv = $image = $statut = "";

    if(!empty($_POST)) 
    {
        $login              = checkInput($_POST['login']);
        $pass              = checkInput($_POST['pass']);
        $niv           = checkInput($_POST['niv']);
        $statut               = checkInput($_POST['statut']);
        $image              = checkInput($_FILES['image']['name']);
        $imagePath          = "images/";
        $imageExtension     = pathinfo($imagePath.$image,PATHINFO_EXTENSION);
        $isSuccess          = true;
        // $isUploadSuccess    = false;
        
        if(empty($login)) 
        {
            $loginError = 'Ce champ ne peut pas être vide';
         $isSuccess = false;
        }
        if(empty($pass)) 
        {
            $passError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($niv)) 
        {
            $nivError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($statut)) 
        {
            $statutError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(!empty($image)) 
        {
           
            // $isSuccess = false;
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
           /* if(file_exists($imagePath.$image)) 
            {
                $imageError = "L'image existe déja";
                $isUploadSuccess = false;
            }*/
            if(isset($_FILES['image']) ) 
            {
                // $imageError = "Le fichier ne doit pas depasser les 500KB";
/*                $isUploadSuccess = false;
*/              $tmp_name = $_FILES['image']['tmp_name'];
              move_uploaded_file($tmp_name, $imagePath.$image) ;
            }
        }
        else
        {
              $isUploadSuccess = true;

        }
        
        // if($isSuccess && $isUploadSuccess) 
        if($isSuccess && $isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO user (login,pass,niv,statut,image) values(?, ?, ?, ?, ?)");
            $statement->execute(array($login,$pass,$niv,$statut,$image));
            Database::disconnect();
            // header("Location: index.php?menu=equipez");
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
<!--         <link href="assets/css/style_cl.css" rel="stylesheet" type="text/css" />
 -->                <link href="assets/css/style_dark.css" rel="stylesheet" type="text/css" />


        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="menu.php" class="logo">
                            
                            <img src="image/nan.png" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                            <span>NaN.</span>
                       
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                       
                        <h5><a href="#"><?php echo $_SESSION['login'] ; ?></a> </h5>
                        <p class="text-muted"> Statut : <?php echo $_SESSION['statut'] ; ?></p>
                    </div>
<style type="text/css">

    a
    {
        color: gray !important;
    }
    a:hover
    {
        color: white !important;
    }
</style>
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!--<li class="menu-title">Navigation</li>-->

                           <li>
                                <a href="menu.php" >
                                                                       <i class="dripicons-home"></i><span> HOME </span>
 
                                </a>
                            </li>
                                                        <li class="menu-title">GESTION DE L'EQUIPAGE</li>


                            <li>
                                <a href="javascript: void(0);"><i class=" dripicons-rocket"></i> <span> Equipes </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                         <?php
                       /* require 'database.php';*/
                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM equipe ORDER BY equipe.id ASC');
                        while($item = $statement->fetch()) 
                        {   
                            if ($item['nom'] == "ARCHIVRES") {
     echo '<li><a href="equipe.php?eq='.$item['id'].'"><i class="dripicons-archive"></i><span>'.$item['nom'].'</span></a></li>';
                                                             }
                            else{
    echo '<li><a href="equipe.php?eq='.$item['id'].'"><i class="dripicons-rocket"></i><span>'.$item['nom'].'</span></a></li>';                              
                                                             }                                 
                                 }
                        Database::disconnect();
                      ?> 
                                    <li><a href="apps-contacts.php">Contacts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="groupe.php">
                                    <i class="dripicons-user-group"></i><span> Groupes </span>
                                </a>
                            </li>
                            <li>
                                <a href="mail.php"><i class="fi-mail"></i><span> Mailing </span></a>
                            </li>
                             <li>
                                <a href="#"><i class="fi-paper"></i><span> Notes </span></a>
                            </li>
                                                                                    <li class="menu-title">GESTION DES COURS</li>
                            <li>
                                <a href="projet.php"><i class=" mdi mdi-folder-multiple"></i><span> Projets </span></a>
                            </li>
                             <li>
                                <a href="quizz.php"><i class="fi-paper"></i><span> Quizz </span></a>
                            </li>
                             <li>
                                <a href="#"><i class=" mdi mdi-book-multiple"></i><span> Matières </span></a>
                            </li>

                          <li class="menu-title">Statistiques</li>
                            <li>
                                <a href="#"><i class="dripicons-graph-line"></i><span> Graph de Presence </span></a>
                            </li>
                             <li>
                                <a href="graphp.php"><i class="dripicons-graph-line"></i><span> Graph Des Projets </span></a>
                            </li>
                             <li>
                                <a href="#"><i class="dripicons-graph-line"></i><span> Graph Des Quizz </span></a>
                            </li>                                                                                                                   


                           

                            <li class="menu-title">PARAMETTRES</li>
                             <li>
                                <a href="local.php"><i class="icon-location-pin"></i><span> Localisation </span></a>
                            </li>
                             <li>
                                <a href="date.php"><i class=" icon-calender"></i><span> Dates </span></a>
                            </li>
                            <li>
                                <a href="commentaire.php"><i class="icon-location-pin"></i><span> commentaires </span></a>
                            </li>
                             <li>
                                <a href="compte.php?name=<?php echo $_SESSION['login'] ?>"><i class="mdi mdi-account-settings-variant mr-1"></i><span> Gestion des comptes </span></a>
                            </li>

                                             <li class="menu-title">More</li>
                            





                        </ul>

                    </div>
                    <!-- Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

               <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="dropdown notification-list">
                                
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">


                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                        
                                    

                                        <!-- item-->
                                       
                                        <!-- item-->
                                       

                                        <!-- item-->
                                       

                                        <!-- item-->
                                       
                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li>

                            <li class="dropdown notification-list">
                                
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                   

                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                                      

                                        <!-- item-->
                                       
                                        <!-- item-->
                                        

                                        <!-- item-->
                                       

                                        <!-- item-->
                                        
                                    </div>

                                    <!-- All-->
                                   

                                </div>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="images/<?php echo $_SESSION['image']  ?>" alt="user" class="rounded-circle"> <span class="ml-1">
                                        <?php echo $_SESSION['login'] ; ?><i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
                                    <!-- item-->
                                    <a class="dropdown-item notify-item" href="login.php">
                                        <i class="fi-power"></i> <span data-toggle="modal" data-target="#exampleModal">Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>





 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Se déconnecter</h5>

            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Êtes-vous sûrs de vouloir vous déconnecter ?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
            <a class="btn btn-primary" href="login.php">Oui</a>
          </div>
        </div>
      </div>
    </div>







                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard </h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to Highdmin admin panel !</li>
                                    </ol>
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->



                <!-- Start Page content -->
                   <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info btn-lg btn-creer" data-toggle="modal" data-target="#myModal">Ajouter un étudiant</button>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->



  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Espace de Creation</h4>
          <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        <div class="modal-body">
       <!-- . -->
            <?php 
                    

            ?>
             <form class="form" action="compte.php?name=<?php echo $_GET['name'] ?>" role="form" method="post" enctype="multipart/form-data" id="form-group">
                    <div class="form-group">
                        <label for="login">Login:</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Entrez un login">
                        <span class="help-inline"><?php echo $loginError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Password:</label>
                        <input type="text" class="form-control" id="pass" name="pass" placeholder="Entrez un mot de passe">
                        <span class="help-inline"><?php echo $passError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="price">Niveau:</label>
                        <input type="number" class="form-control" id="niv" name="niv" placeholder="Entrez un niveau">
                        <span class="help-inline"><?php echo $nivError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Statut:</label>
                        <input type="text" class="form-control" id="statut" name="statut" placeholder="Entrez un Statut">
                        <span class="help-inline"><?php echo $statutError;?></span>
                    </div>
                 
                 
                   
                    <div class="form-group">
                        <label for="image">Sélectionner une image:</label>
                        <input type="file" id="image" name="image"> 
                        <span class="help-inline"><?php echo $imageError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" id="cliki"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="compte.php?name=<?php echo $_GET['name'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>





                        <div class="row">

                        </div>
                        <!-- end row -->

                         <div class="row">  
                        </div>
                        <!-- end row -->


                        <div class="row">
                              <?php
                       /* require 'database.php';*/
                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM user ');

                       
                        while($item = $statement->fetch()) 
                        {
                           echo '<div class="col-md-4">';
                               echo '<div class="text-center card-box">';

                                   echo '<div class="member-card pt-2 pb-2">';
                                      echo '<div class="thumb-lg member-thumb m-b-10 mx-auto">';
                                        echo '<img src="images/'.$item['image'].'" class="rounded-circle img-thumbnail" alt="profile-image">
                                        </div>';

                                       echo '<div class="">';
                                          echo '<h4 class="m-b-5">'.$item['login'].'</h4>';
                            echo '<p class="text-muted">@'.$item['statut'].'</p>
                                        </div>';

                                       echo '<ul class="social-links list-inline m-t-20">';
                            
                                      echo  '</ul>';

                                       echo '<a href="up.php?mb='.$item['id'].'"><button type="button" class="btn btn-primary m-t-20 btn-rounded btn-bordered waves-effect w-md waves-light">Modifier</button></a>';
                                       echo " ";

                                       echo '<div class="mt-4">
                                            <div class="row">
                                                <div class="col-4">';
                                                
                                               echo '</div>
                        
                                                
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>';
                        }
                         
                        Database::disconnect();
                      ?>


                            
                        </div>
                    
                    </div> <!-- container -->

                </div> <!-- content -->


                <footer class="footer text-right">
                    2018 © Highdmin. - Coderthemes.com
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- Flot chart -->
        <script src="../plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="../plugins/flot-chart/curvedLines.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.axislabels.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="../plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="assets/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>