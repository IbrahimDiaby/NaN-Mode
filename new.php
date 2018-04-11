<?php

    function verify($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }  

    if(verify(!empty(isset($_POST['admin'])))){
        $lien = verify($_POST['avatar']);
        $db = new PDO("mysql:host=localhost;dbname=Mode", 'root', 'root');
        $req = $db->prepare("INSERT INTO Client(Avatar, Admin, Password, Nom, Prenom, Anniversaire, Mail, Sexe, Numero, Ville, Commune) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $req->execute(array($lien, verify($_POST['admin']), verify($_POST['password']), verify($_POST['lastname']), verify($_POST['firstname']), verify($_POST['day'] . " " . $_POST['month'] . " " . $_POST['year']), verify($_POST['mail']), verify($_POST['sexe']), verify($_POST['number']), verify($_POST['ville']), verify($_POST['commune'])));
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscribe Client Aside</title>
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
    
    <link rel="stylesheet" href="new.css" type="text/css" />
</head>
<body>
    <header>
            <div id="CCI"><img src="CCI.png" alt="" title="Central CI" id="CCILogo" /></div>
            <div id="CCItext"><h3>Central CI</h3></div>
            <div id="searchcontain">
                    <!-- <input type="text" name="search" id="search" title="Recherche" placeholder="Recherche" /> -->
            </div>
            <div class="Connect"><a href="login.php" class="btn btn-outline-success">Connexion</a></div>
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
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="lastname">
                    Nom:
                    <br />
                    <input type="text" name="lastname" id="lastname" placeholder="Nom" required />
                </label>

                <label for="firstname">
                    <input type="text" name="firstname" id="firstname" placeholder="Prénom" required />
                </label>
                <br />

                <label for="admin">
                    Nom D'Utilisateur:
                    <br />
                    <input type="text" name="admin" id="admin" placeholder="Nom D'Utilisateur" required />
                </label>
                
                <label for="mail">
                    Email:
                    <br />
                    <input type="email" name="mail" id="mail" placeholder="Adresse électronique" required/>
                </label>
                <br />

                <label for="password">
                    Créez un mot de passe: <br /><input type="password" name="password" id="password" placeholder="Mot De Passe" required/>
                </label>
                <br />

                <label for="day">Date de naissance : <br />
                    <select name="day" id="day">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7" selected>7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                       </select>

                    <select name="month" id="month">
                        <option>Mois</option>
                        <option value="Janvier">Janvier</option>
                        <option value="Février">Février</option>
                        <option value="Mars">Mars</option>
                        <option value="Avril">Avril</option>
                        <option value="Mai">Mai</option>
                        <option value="Juin">Juin</option>
                        <option value="Juillet">Juillet</option>
                        <option value="Aout" selected>Aout</option>
                        <option value="Septembre">Septembre</option>
                        <option value="Octobre">Octobre</option>
                        <option value="Novembre">Novembre</option>
                        <option value="Décembre">Décembre</option>
                    </select>

                    <select name="year">
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960" selected>1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            <option value="1949">1949</option>
                            <option value="1948">1948</option>
                            <option value="1947">1947</option>
                            <option value="1946">1946</option>
                            <option value="1945">1945</option>
                            <option value="1944">1944</option>
                            <option value="1943">1943</option>
                            <option value="1942">1942</option>
                            <option value="1941">1941</option>
                            <option value="1940">1940</option>
                            <option value="1939">1939</option>
                            <option value="1938">1938</option>
                            <option value="1937">1937</option>
                            <option value="1936">1936</option>
                            <option value="1935">1935</option>
                            <option value="1934">1934</option>
                            <option value="1933">1933</option>
                            <option value="1932">1932</option>
                            <option value="1931">1931</option>
                            <option value="1930">1930</option>
                            <option value="1929">1929</option>
                            <option value="1928">1928</option>
                            <option value="1927">1927</option>
                            <option value="1926">1926</option>
                            <option value="1925">1925</option>
                            <option value="1924">1924</option>
                            <option value="1923">1923</option>
                            <option value="1922">1922</option>
                            <option value="1921">1921</option>
                            <option value="1920">1920</option>
                            <option value="1919">1919</option>
                            <option value="1918">1918</option>
                            <option value="1917">1917</option>
                            <option value="1916">1916</option>
                            <option value="1915">1915</option>
                            <option value="1914">1914</option>
                            <option value="1913">1913</option>
                            <option value="1912">1912</option>
                            <option value="1911">1911</option>
                            <option value="1910">1910</option>
                            <option value="1909">1909</option>
                            <option value="1908">1908</option>
                            <option value="1907">1907</option>
                            <option value="1906">1906</option>
                            <option value="1905">1905</option>
                            <option value="1904">1904</option>
                            <option value="1903">1903</option>
                            <option value="1902">1902</option>
                            <option value="1901">1901</option>
                            <option value="1900">1900</option>
                       </select>
                </label>
                <br />

                <label for="sexe">
                    Sexe:
                    <br />
                    <select name="sexe" id="sexe">
                        <option>Sexe</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </label>
                <br />

                <label for="number">
                        Numéro de téléphone :
                        <br />
                        <input type="text" name="number" id="number"  placeholder="Contact" required />
                        <br />
                    </label>

                <label for="ville">
                    Ville:
                    <br />
                    <input type="text" name="ville" id="ville"  placeholder="Ville" required />
                </label>
                <br />

                <label for="commune">
                    Commune:
                    <br />
                    <input type="text" name="commune" id="commune"  placeholder="Commune" required />
                </label>
                <br />

                <label for="avatar">
                    Avatar:
                    <br />
                    <input type="file" name="avatar" id="avatar"  placeholder="Avatar" required />
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