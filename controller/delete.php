<?php

if(isset($_POST['oui'])) {
    
    $sp=fopen("../model/supp.csv","r");
    
    while($ligne=fgetcsv($sp,100)){
    $t=explode(' ',$ligne);
    $mat= $ligne[0];
    }
    fclose($sp);

    $f=fopen('../model/emp.csv','r');
    
    while($tab=fgetcsv($f,1000,";")){
        if($mat ==$tab[0]){
            $mat = $tab[0];
            $pre = $tab[1];
            $nm = $tab[2];
            $dt = $tab[3];
            $sl = $tab[4];
            $tel = $tab[5];
            $em = $tab[6];
        }    
    }
    fclose($f);
    
    $tmp=file("../model/emp.csv");
    
    for($i = 0 ; $i <= count($tmp);$i++){
       $tab=explode(";",$tmp[$i]);
       if($tab[0]==$mat){
        unset($tmp[$i]);
       }
        file_put_contents("../model/emp.csv",$tmp);
        unlink('../model/supp.csv');
        echo "<script type='text/javascript'>document.location.replace('../main.php');</script>";
            exit();
    }
}
elseif (isset($_POST['non'])) {
    header('location:../main.php');
}

?>