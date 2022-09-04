<!DOCTYPE html>
<html>
    <head>
        <title>ajouter une nouvelle commande</title>
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
                    <div class="row">
                                    <h4 style="color:red;">
                                        <span class="glyphicon glyphicon-warn-sign"></span>
                                        <?php
                                            if(isset($_GET['error'])){
                                                echo "les informations saisies ne sont pas valides";
                                            }
                                        ?>
                                    </h4>
                                </div>
                    <aside>
                        <div class="row">
                        <form class="form-horizontal col-md-offset-3 col-md-6" method="GET" action="../REQUETTES/verifier_ligne_commandes.php">
                                <div class="form-group">
                                    <legend>Ajouter une ligne de commandes d'un client</legend>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4">Id.Client: </label>
                                        <div class="col-md-8">
                                        <select style="font-size:20px;" class="form-control" name='client'>
                                                <?php
                                                    $dom = new DOMDocument('1.0', 'utf-8');
                                                    $xml = file_get_contents('client.xml');
                                                    @$dom->loadHTML($xml);
                                                    $a = $dom->getElementsByTagName('client');
                                                    foreach($a as $att){                       
                                                        ?><option> <?php echo $att->getAttribute('id');?> </option> <?php
                                                    }                                                   
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4">Date de commande: </label>
                                        <div class="col-md-8">
                                            <input type="date" name="date_commande" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4">Designation: </label>
                                        <div class="col-md-8">
                                            <input type="text" name="designation" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4">quantite commande: </label>
                                        <div class="col-md-8">
                                            <input type="number" name="quantite_commande" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4">paye: </label>
                                        <div class="col-md-8">
                                            <select name="paye" class="form-control">
                                                <option>Non</option>
                                                <option>Oui</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>        
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button class="btn btn-info form-control" type="submit" name="enregistrer">
                                            <span class="glyphicon glyphicon-ok-sign"></span>
                                            ajouter dans ligne de commandes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </aside>
                    <?php include('footer.php');?>
                </div>
            </div>
        </div>
    </body>
</html>