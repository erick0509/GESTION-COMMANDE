<!DOCTYPE html>
<html>
    <head>
        <title>liste des commandes payes</title>
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
                    <aside class="table-responsive">
                            <?php 
            
                                        $dom = new DOMDocument('1.0', 'utf-8');
                                        $dom->formatOutput = true;
                                        $dom->preserveWhiteSpace = false;
                                        $dom->load('commande.xml');
                                        $xpath = new DOMXPath($dom);
                                        $lgcommande= $xpath->query("//ligne_commande[paye='Oui']");// utilisation de Xpath
                                        if($lgcommande->length==0){
                                            echo "<h4 style='color:red;'>tout les commandes ne sont pas payes</h4>";
                                        }
                                        else{
                                            ?>
                                            <table class="table table-bordered table-striped ">
                                                <caption>
                                                    <h4>liste des commandes payes</h4>
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
                                                    $elem=$lgcommande->item($i)->firstChild;
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
                            ?>
                    </aside>
                    <?php include('footer.php');?>
                </div>
            </div>
        </div>
    </body>
</html>