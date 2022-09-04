<!DOCTYPE html>
<html>
    <head>
        <title>menu de recherche de client</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/accueil.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <header class="row page-header">
                        <div class="col-md-offset-1 col-md-10 titre"><h1>GESTION DE COMMANDES</h1></div>
                    </header>
                    <aside>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <a class="btn btn-info form-control" href="chercher_client_par_id.php">
                                    <span class="glyphicon glyphicon-chevron-left pull-left"></span>
                                    chercher le client par son ID</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <a class="btn btn-info form-control" href="chercher_client_par_email.php">
                                    <span class="glyphicon  glyphicon-chevron-left pull-left"></span>
                                    chercher le client par son EMAIL
                                </a>
                            </div>
                        </div>
                    </aside>
                    <?php include('footer.php');?>
                </div>
            </div>
        </div>
    </body>
</html>