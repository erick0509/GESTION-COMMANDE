<!DOCTYPE html>
<html>
    <head>
        <title>chercher la commande par son id</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/nouveau_client.css" rel="stylesheet">
        <link href="../css/client.css" rel="stylesheet"/>
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
                                        echo "le ID n'est pas valides";
                                    }
                                ?>
                        </h4>
                    </div>
                    <aside class="table-responsive">
                        <div class="row">
                            <form class="form-horizontal col-md-offset-3 col-md-6" method="GET" action="../REQUETTES/chercher_commande_id.php">
                                <div class="form-group">
                                    <legend>Chercher la commande par son ID</legend>
                                </div>
                                <div class="row">
                                    <div class="form-group has-feedback">
                                        <div class="col-md-offset-1 col-md-10">
                                            <input type="text" name="id" class="form-control" placeholder="id commande">
                                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                        </div>
                                    </div>
                                </div>   
                            </form>
                        </div>
                        <div class="row">
                            <?php 
                                if(isset($_GET['id_valid'])){
                                        $i=$_GET['id_valid'];
                                        $dom = new DOMDocument('1.0', 'utf-8');
                                        $dom->formatOutput = true;
                                        $dom->preserveWhiteSpace = false;
                                        $dom->load('commande.xml');
                                        $xpath = new DOMXPath($dom);
                                        $lgcommande= $xpath->query("//ligne_commande[@no_ligne_commande=$i]");// utilisation de Xpath
                                        if($lgcommande->length==0){
                                            echo "<h4 style='color:red;'>le ID est introuvable dans la liste de commande</h4>";
                                        }
                                        else{
                                            ?>
                                            <table class="table table-bordered table-striped ">
                                                <caption>
                                                    <h4>resultat du recherche</h4>
                                                </caption>
                                                <thead>
                                                    <tr>                       
                                                        <th>id.Client</th>
                                                        <th>ligne commande</th>
                                                        <th>date commande</th>
                                                        <th>designation</th>
                                                        <th>quantite commande</th>
                                                        <th>paye</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php
                                                    $parent=$lgcommande->item(0);
                                                    $grandparent=$parent->parentNode;
                                                    echo "<tr class='active'>";
                                                    echo "<td style='color:blue;'>".$grandparent->getAttribute('no_client')."</td>";
                                                    echo "<td style='color:red;'>".$parent->getAttribute('no_ligne_commande')."</td>";
                                                    $j=1;
                                                    $elem=$lgcommande->item(0)->firstChild;
                                                    while($j<=4){
                                                        echo "<td>".$elem->nodeValue."</td>";
                                                        $elem=$elem->nextSibling;
                                                        $j++;
                                                    }
                                                    echo "</tr>";
                                            ?>
                                                </tbody>
                                            </table>
                                            <?php
                                        }
                                        
                                }
                            ?>
                        </div>
                    </aside>
                    <?php include('footer.php');?>
                </div>
            </div>
        </div>
    </body>
</html>