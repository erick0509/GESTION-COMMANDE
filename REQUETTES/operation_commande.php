<?php
    session_start();
    if (isset($_POST['modifier'])){    
    ?>
    <!DOCTYPE html>
<html>
    <head>
        <title>ajouter un nouveau client</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/nouveau_client.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 corps">
                    <header class="row page-header">
                        <div class="col-md-offset-1 col-md-10 titre"><h1>GESTION DE COMMANDES</h1></div>
                    </header>
                    <aside>
                        <div class="row">
                            <form class="form-horizontal col-md-offset-3 col-md-6" method="POST" action="../REQUETTES/save_modif_commande.php">
                                <div class="form-group">
                                    <legend>Modification du commande du client #<?php echo $_SESSION['no_client']?></legend>
                                </div>
                                <div class="row">
                                </div>   
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4">Date de commande: </label>
                                        <div class="col-md-8">
                                            <input value='<?php echo $_SESSION['date_commande']?>' type="date" name="date_commande" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4">Designation: </label>
                                        <div class="col-md-8">
                                            <input value='<?php echo $_SESSION['designation']?>' type="text" name="designation" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4">quantite commande: </label>
                                        <div class="col-md-8">
                                            <input value='<?php echo $_SESSION['quantite_commande']?>' type="number" name="quantite_commande" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4">paye: </label>
                                        <div class="col-md-8">
                                            <select value='<?php echo $_SESSION['paye']?>' name="paye" class="form-control">
                                                <option>Non</option>
                                                <option>Oui</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-8">
                                        <button class="btn btn-info form-control" type="submit" name="modifier">
                                            <span class="glyphicon glyphicon-ok-sign"></span>
                                            enregistrer la modification
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </aside>
                    <?php include('../VUES/footer.php');?>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    }
    else if(isset($_POST['supprimer'])){
        $i=$_SESSION['no_ligne_commande'];
        $doc = new DOMDocument; 
        $doc->load('../VUES/commande.xml');
        $thedocument = $doc->documentElement;
        $xpath = new DOMXPath($doc);
        $list = $thedocument->getElementsByTagName('ligne_commande');
        $nodeToRemove = null;
        //recuperation de l'element a supprimer
        foreach ($list as $domElement){
            $attrValue = $domElement->getAttribute('no_ligne_commande');
            if ($attrValue == $i) {
                $nodeToRemove = $domElement;
                break; 
            }
        }
        //recuperation de l'element parent a supprimer
        if ($nodeToRemove != null){
            $commande= $xpath->query("//commande[ligne_commande[@no_ligne_commande=$i]]");
            $com=$commande->item(0)->getAttribute('no_client');
            $commande=$xpath->query("//commande[@no_client=$com]");
            $commande->item(0)->removeChild($nodeToRemove);
        }
        $doc->save('../VUES/commande.xml');
        header("location:../VUES/commande.xml");
    }
    
?>