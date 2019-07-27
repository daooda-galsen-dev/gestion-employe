<?php
	if (isset($_GET['ok'])){
		$mat = $_GET['ok'];
		$f = fopen("../model/emp.csv", "r");
		while ($tab = fgetcsv($f, 1000, ";")) {
			if($mat == $tab[0]){
                $pre = $tab[1];
                $nm = $tab[2];
                $dt = $tab[3];
                $sl = $tab[4];
                $tel = $tab[5];
                $em = $tab[6];
			}
		}
    }
?>
<!DOCTYPE html>
<html lang="FR-fr">
<!---Daouda BA / Promo 2 Sonatel Academy-->
<!---PROJET de création d'un Formulaire de gestion des employés avec PHP/HTML/CSS-->

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Modification des employés</title>

  <link rel="stylesheet" type="text/css" href="style.css">
  <!---Importation de Google Fonts pour les fonts-->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <?php

    // Déclaration des variables de controle
    $ctr_mail="/(^[a-z])([a-z0-9])+(\.|-)?([a-z0-9]+)@([a-z0-9]{2,})\.([a-z]{2,4}$)/";
    $ctr_num= "#^7[7068][0-9]{7}$#";
    $ctr_date="#^[0-9]{1,2}[/][0-9]{1,2}[/][0-9]{4}#";
    $ctr_prenom="#^[a-zA-Z]{2,50}#";
    $ctr_nom="#^[a-zA-Z]{2,50}#";

    if(isset($_POST['valider'])){
     
        if (empty($_POST['prenom']) OR empty($_POST['nom']) OR empty($_POST['date']) OR empty($_POST['salaire']) OR empty($_POST['telephone']) OR empty($_POST['email'])){
            echo "<div class=\"alt\">Veuillez remplir tous les champs</div>";
        }
        elseif ( !preg_match($ctr_prenom,$_POST['prenom'])) {
            echo"<div class=\"alt-PR\">Le format du prénom est incorrect</div>";
        }
        elseif (!preg_match($ctr_nom,$_POST['nom'])) {
            echo "<div class=\"alt-NM\">Le format du nom est incorrect</div>";
        }
        elseif (!preg_match($ctr_date,$_POST['date'])) {
            echo"<div class=\"alt-DT\">Le format du date de naissance est incorrect</div>";
        }
        elseif (!is_numeric($_POST['salaire'])) {
            echo" <div class=\"alt-SL\">Le format du salaire est incorrect</div>";
        }
        elseif ($_POST['salaire'] < 300000) {
            echo" <div class=\"alt-SL\">Le salaire minimum est de 300.000</div>";
        }
        elseif ($_POST['salaire'] > 2000000) {
            echo" <div class=\"alt-SL\">Le salaire maximum est de 2.000.000</div>";
        }
        elseif (!preg_match($ctr_num,$_POST['telephone'])) {
            echo"<div class=\"alt-NU\">Le format du numéro est incorrect</div>";
        }
        elseif (!preg_match($ctr_mail,$_POST['email'])) {
            echo "<div class=\"alt-EM\">Le format de l'email est incorrect</div>";
        }
    
        else{ 
            $mat=$_POST['matricule'];
            $pre=$_POST['prenom'];
            $nm=$_POST['nom'];
            $dt=$_POST['date'];
            $sl=$_POST['salaire'];
            $tel=$_POST['telephone'];
            $em=$_POST['email'];
        }
   }
   ?>

    <div class="container">
        <form action="../controller/edit.php?cd=<?php echo $mat;?>" method="post">
        <div class="row">
            <div class="col-25">
                <label for="pre">Matricule :</label>
            </div>
            <div class="col-75">
                <input type="text" id="mat" name="matricule" value="<?php echo $mat;?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="pre">Prénom :</label>
            </div>
            <div class="col-75">
                <input type="text" id="pre" name="prenom" value="<?php echo $pre;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="nom">Nom :</label>
            </div>
            <div class="col-75">
                <input type="text" id="nom" name="nom" value="<?php echo $nm;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="date">Date de naissance :</label>
            </div>
            <div class="col-75">
                <input type="text" id="date" name="date" value="<?php echo $dt;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="salaire">Salaire :</label>
            </div>
            <div class="col-75">
                <input type="text" id="slr" name="salaire" value="<?php echo $sl;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="telephone">Téléphone :</label>
            </div>
            <div class="col-75">
                <input type="text" id="tel" name="telephone" value="<?php echo $tel;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">Email :</label>
            </div>
            <div class="col-75">
                <input type="text" id="email" name="email" value="<?php echo $em;?>" >
            </div>
        </div>

        <div class="row">
            <input type="submit" name="mod" value="Modifier">
        </div>

        <div class="copy"><p>Copyright 💡 | Daooda-BA | 💻 2019</p></div>
    </form>

</body>
</html>