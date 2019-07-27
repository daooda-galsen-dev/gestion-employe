<?php
  if(isset($_POST['mod'])){
  	$c=$_GET['cd']; //Variable code apres modification
    
    $mat=$_POST['matricule'];
    $pre=$_POST['prenom'];
    $nm=$_POST['nom'];
    $dt=$_POST['date'];
    $sl=$_POST['salaire'];
    $tel=$_POST['telephone'];
    $em=$_POST['email'];
    
    $obj= $mat.";".$pre.";".$nm.";".$dt.";".$sl.";".$tel.";".$em."\n";


    $f=fopen("../model/emp.csv","r");
    $tmp=fopen("../model/tmp.csv", "w");
    while ($tab=fgetcsv($f,1000,";")) {
    	if ($tab[0]!=$c) {
    		$svg=$tab[0].";".$tab[1].";".$tab[2].";".$tab[3].";".$tab[4].";".$tab[5].";".$tab[6]."\n";//contenu du fichier tmp.csv
    		fputs($tmp,$svg);
    	}
    }
    fputs($tmp,$obj);
    fclose($f);
    fclose($tmp);
    copy("../model/tmp.csv","../model/emp.csv");    //copie du fichier tmp.csv
    unlink("../model/tmp.csv");  //suppression du fichier tmp.csv
    header("location:../main.php");
  }
?>