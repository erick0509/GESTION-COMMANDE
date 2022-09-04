<?php
    if(empty($_GET['email'])){
        header('location:../VUES/chercher_client_par_email.php?error=0');
    }
    else{
        header('location:../VUES/chercher_client_par_email.php?email_valid='.$_GET['email']);
    }
?>