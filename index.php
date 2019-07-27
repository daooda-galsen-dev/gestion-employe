<!DOCTYPE html>
<html lang="FR-fr">
<!---Daouda BA / Promo 2 Sonatel Academy-->
<!---PROJET de création d'un Formulaire de gestion des employés avec PHP/HTML/CSS-->

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Enregistrement des employés</title>

  <link rel="stylesheet" type="text/css" href="view/style.css">
  <!---Importation de Google Fonts pour les fonts-->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    // Création du matricule
    $f = fopen("model/emp.csv","r");
    $nbL = count(file("model/emp.csv"));    //compte le nombre de ligne du fichier
    if($nbL==0){
    $nbL = 1;
    $matricule ="EM-".sprintf("%05d",$nbL);
    }
    else{
    $nbL = count(file("model/emp.csv"));
    $nbL +=1; //si le fichier est vide il commence par 1
    $matricule = "EM-".sprintf("%05d",$nbL);
    }
    fclose($f);

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

            $f = fopen("model/emp.csv","a");
            // contenu du fichier
            $obj= $mat.";".$pre.";".$nm.";".$dt.";".$sl.";".$tel.";".$em."\n";
            fputs($f,$obj);

            $nbL = count(file("model/emp.csv"));
            fclose($f);
         
            $nbL++;
            $matricule ="EM-".sprintf("%05d",$nbL);
            
            // redirection
            echo "<script type='text/javascript'>document.location.replace('main.php');</script>";
            exit();
        }
   }
   ?>

    <div class="container">
        <form action="index.php" method="post">
        <div class="row">
            <div class="col-25">
                <label for="mat">Matricule :</label>
            </div>
            <div class="col-75">
                <input class="matri" type="text" id="mat" name="matricule" value="<?php echo $matricule;?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="pre">Prénom :</label>
            </div>
            <div class="col-75">
                <input type="text" id="pre" name="prenom" placeholder="Entrer votre nom..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="nom">Nom :</label>
            </div>
            <div class="col-75">
                <input type="text" id="nom" name="nom" placeholder="Entrer votre nom..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="date">Date de naissance :</label>
            </div>
            <div class="col-75">
                <input type="text" id="date" name="date" placeholder="Entrer votre date de naissance (format: JJ/MM/AAAA)">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="slr">Salaire :</label>
            </div>
            <div class="col-75">
                <input type="text" id="slr" name="salaire" placeholder="Entrer votre salaire (compris entre 300.000 & 2.000.000)">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="tel">Téléphone :</label>
            </div>
            <div class="col-75">
                <input type="text" id="tel" name="telephone" placeholder="Entrer le numéro (format: 70 ou 76 ou 77 ou 78 + 7 chiffres)">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">Email :</label>
            </div>
            <div class="col-75">
                <input type="text" id="email" name="email" placeholder="Entrer votre adresse email (format adresse@mail.aaa)" >
            </div>
        </div>

        <div class="row">
            <input type="submit" name="valider" value="ENREGISTRER">
        </div>

        <div class="copy"><p>Copyright 💡 | Daooda-BA | 💻 2019</p></div>
    </form>

</body>
</html>