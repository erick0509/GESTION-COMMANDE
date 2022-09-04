<!DOCTYPE html>
<html>
    <head>
        <title>chercher le client par son id</title>
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
                            <form class="form-horizontal col-md-offset-3 col-md-6" method="GET" action="../REQUETTES/chercher_client_id.php">
                                <div class="form-group">
                                    <legend>Chercher le client par son ID</legend>
                                </div>
                                <div class="row">
                                    <div class="form-group has-feedback">
                                        <div class="col-md-offset-1 col-md-10">
                                            <input type="text" name="id" class="form-control" placeholder="inserer le ID">
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
                                        $dom->preserveWhiteSpace =false;
                                        $dom->load('client.xml');
                                        $xpath = new DOMXPath($dom);
                                        $lgcommande= $xpath->query("//client[@id=$i]");// utilisation de Xpath
                                        if($lgcommande->length==0){
                                            echo "<h4 style='color:red;'>le ID est introuvable dans la liste</h4>";
                                        }
                                        else{
                                            ?>
                                            <table class="table table-bordered table-striped ">
                                                <caption>
                                                    <h4>resultat du recherche</h4>
                                                </caption>
                                                <thead>
                                                    <tr>                       
                                                        <th>ID</th>
                                                        <th>Nom</th>
                                                        <th>Prenom</th>
                                                        <th>Adresse</th>
                                                        <th>Age</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php
                                                    session_start();
                                                    echo "<td style='color:red;''>".$lgcommande->item(0)->getAttribute('id')."</td>";
                                                    $j=1;
                                                    $elem=$lgcommande->item(0)->firstChild;
                                                    while($j<=5){
                                                        echo "<td>".$elem->nodeValue."</td>";
                                                        if($j==1){
                                                            $_SESSION['nom']=$elem->nodeValue;
                                                        }
                                                        if($j==2){
                                                            $_SESSION['prenom']=$elem->nodeValue;
                                                        }
                                                        if($j==3){
                                                            $_SESSION['adresse']=$elem->nodeValue;
                                                        }
                                                        if($j==4){
                                                            $_SESSION['age']=$elem->nodeValue;
                                                        }
                                                        if($j==5){
                                                            $_SESSION['email']=$elem->nodeValue;
                                                        }
                                                        $elem=$elem->nextSibling;
                                                        $j++;
                                                    }
                                                    $_SESSION['id']=$_GET['id_valid'];
                                            ?>
                                                </tbody>
                                            </table>
                                                <div class="row">
                                                    <form method="POST" action="../REQUETTES/operation.php">
                                                        <div class="row">
                                                            <div class="col-md-offset-4 col-md-4">
                                                                <input type="submit" name="modifier" value="modifier" class="btn btn-success form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-offset-4 col-md-4">
                                                                <input type="submit" name="supprimer" value="supprimer" class="btn btn-warning form-control">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
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