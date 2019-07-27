<?php
$_GET['ok']."<br>";
$supp=$_GET['ok'];
$sp=fopen("../model/supp.csv","a");
fputs($sp,$supp);
fclose($sp);
?>
<!DOCTYPE html>
<html lang="FR-fr">
<!---Daouda BA / Promo 2 Sonatel Academy-->
<!---PROJET de création d'un Formulaire de gestion des employés avec PHP/HTML/CSS-->

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Suppression des employés</title>

  <link rel="stylesheet" type="text/css" href="extra.css">
  <!---Importation de Google Fonts pour les fonts-->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h3>Souhaitez-vous vraiment supprimer cet employé ?</h3>
        
        <form action="../controller/delete.php" method="post">
        
        <input type="submit" name="oui" value="OUI" style="background-color: blue;">
        <input type="submit" name="non" value="NON" style="background-color: red;">
    </form>
    </div>

</body>
</html>