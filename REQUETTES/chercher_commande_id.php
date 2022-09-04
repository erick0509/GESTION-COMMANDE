<?php
    settype($_GET['id'],"integer");
    if(empty($_GET['id']) || !is_int($_GET['id'])){
        header('location:../VUES/chercher_commande_par_id.php?error=0');
    }
    else{
        header('location:../VUES/chercher_commande_par_id.php?id_valid='.$_GET['id']);
    }
?>