<?php
    if(empty($_GET['date']) ){
        header('location:../VUES/lister_commande_par_date.php?error=0');
    }
    else{
        header('location:../VUES/lister_commande_par_date.php?date_valid='.$_GET['date']);
    }
?>