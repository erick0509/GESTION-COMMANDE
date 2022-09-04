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
                            <form class="form-horizontal col-md-offset-3 col-md-6" method="POST" action="../REQUETTES/save_modif_client.php">
                                <div class="form-group">
                                    <legend>Modification du client</legend>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Nom: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="nom" class="form-control" value='<?php echo $_SESSION['nom']?>'>
                                        </div>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Prenom: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="prenom" class="form-control" value='<?php echo $_SESSION['prenom']?>'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Adresse: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="adresse" class="form-control" value='<?php echo $_SESSION['adresse']?>'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Age: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="age" class="form-control" value='<?php echo $_SESSION['age']?>'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Email: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="email" class="form-control" value='<?php echo $_SESSION['email']?>'>
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
        $i=$_SESSION['id'];
        $doc = new DOMDocument; 
        $doc->load('../VUES/client.xml');
        $thedocument = $doc->documentElement;
        $list = $thedocument->getElementsByTagName('client');
        $nodeToRemove = null;
        foreach ($list as $domElement){
            $attrValue = $domElement->getAttribute('id');
            if ($attrValue == $i) {
                $nodeToRemove = $domElement;
                break; 
            }
        }
        if ($nodeToRemove != null)
            $thedocument->removeChild($nodeToRemove);
        $doc->save('../VUES/client.xml');
        header("location:../VUES/client.xml");
    }
    
?>