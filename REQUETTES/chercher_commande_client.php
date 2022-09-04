<?php
    settype($_GET['id'],"integer");
    if(empty($_GET['id']) || !is_int($_GET['id'])){
        header('location:../VUES/lister_commande_par_client.php?error=0');
    }
    else{
        header('location:../VUES/lister_commande_par_client.php?id_valid='.$_GET['id']);
    }
?>