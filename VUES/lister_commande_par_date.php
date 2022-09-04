<!DOCTYPE html>
<html>
    <head>
        <title>lister les commandes effectues par date</title>
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
                                        echo "veuiller inserer une date";
                                    }
                                ?>
                        </h4>
                    </div>
                    <aside class="table-responsive">
                        <div class="row">
                            <form class="form-horizontal col-md-offset-3 col-md-6" method="GET" action="../REQUETTES/chercher_commande_date.php">
                                <div class="form-group">
                                    <legend>Chercher les commandes effectues par date</legend>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-offset-1 col-md-10">
                                            <input type="date" name="date" class="form-control">                                           
                                        </div>                                       
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4">
                                        <input type="submit" class="btn btn-success form-control" value="recherche">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <?php 
                                if(isset($_GET['date_valid'])){
                                        $i=$_GET['date_valid'];
                                        $dom = new DOMDocument('1.0', 'utf-8');
                                        $dom->formatOutput = true;
                                        $dom->preserveWhiteSpace = false;
                                        $dom->load('commande.xml');
                                        $xpath = new DOMXPath($dom);
                                        $lgcommande= $xpath->query("//ligne_commande[date_commande='$i']");// utilisation de Xpath
                                        if($lgcommande->length==0){
                                            echo "<h4 style='color:red;'>aucune commande effectue le ".$i."</h4>";
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
                                                for($i=0;$i<$lgcommande->length;$i++){
                                                    $parent=$lgcommande->item($i);
                                                    $grandparent=$parent->parentNode;
                                                    echo "<tr class='active'>";
                                                    echo "<td style='color:blue;''>".$grandparent->getAttribute('no_client')."</td>";
                                                    echo "<td style='color:red;''>".$parent->getAttribute('no_ligne_commande')."</td>";
                                                    $j=1;
                                                    $elem=$parent->firstChild;
                                                    while($j<=4){
                                                        echo "<td>".$elem->nodeValue."</td>";
                                                        $elem=$elem->nextSibling;
                                                        $j++;
                                                    }
                                                    echo "</tr>";
                                                }
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