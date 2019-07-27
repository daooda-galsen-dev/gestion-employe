<!DOCTYPE html>
<html lang="FR-fr">
<!---Daouda BA / Promo 2 Sonatel Academy-->
<!---PROJET de création d'un Formulaire avec HTML/CSS/PHP-->

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Tableau des inscrits</title>

  <link rel="stylesheet" type="text/css" href="view/style.css">
  <!---Importation de Google Fonts pour les fonts-->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">

    <table>
    <tr>
        <th>Matricule</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Date de naisance</th>
        <th>Salaire</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <tr>
        <?php
            $f=fopen("model/emp.csv","r");    //La fonction fgetcsv permet d'avoir une ligne d'un fichier
            while ($tab=fgetcsv($f,1000,";")) {
                echo "<tr>";    //creation d'une ligne
                    for($i=0;$i<count($tab);$i++){
                      	echo "<td>".$tab[$i]."</td>";   //creation des colonnes et insertion des valeurs
                      	}
                    echo "<td><a href='view/ModifEmp.php?ok=$tab[0]' style='background-color: blue; font-weight: bold; color: white; padding: 10px 10px; font-size: 10px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none;'>MODIFIER</a>
                      	  <a href='view/SuppEmp.php?ok=$tab[0]' style='background-color: red; font-weight: bold; color: white; padding: 10px 10px; font-size: 10px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; margin-left: 4%;'>SUPPRIMER</a></td>";
                echo "</tr>";
            }
   	 	?>
    </tr>
    </table>

    <div class="retour">
    <a class="rt" href="index.php">RETOUR</a>
    </div>

    </div>

</body>
</html>