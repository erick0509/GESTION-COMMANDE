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
                            <form class="form-horizontal col-md-offset-3 col-md-6" method="POST" action="../REQUETTES/save_client.php">
                                <div class="form-group">
                                    <legend>Formulaire d'un client</legend>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Nom: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="nom" class="form-control" placeholder="ex: Jean">
                                        </div>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Prenom: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="prenom" class="form-control" placeholder="ex: Baptiste">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Adresse: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="adresse" class="form-control" placeholder="ex: lot 240 p/lle...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Age: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="age" class="form-control" placeholder="ex: 24">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2">Email: </label>
                                        <div class="col-md-10">
                                            <input type="text" name="email" class="form-control" placeholder="ex: jean@gmail.com">
                                        </div>
                                    </div>
                                </div>        
                                <div class="row">
                                    <div class="col-md-offset-6 col-md-6">
                                        <button class="btn btn-info form-control" type="submit" name="enregistrer">
                                            <span class="glyphicon glyphicon-ok-sign"></span>
                                            enregistrer ce client
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