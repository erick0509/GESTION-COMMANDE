<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
    <html>
        <head>
            <title>liste de tout les commandes</title>
            <link href="../css/bootstrap.min.css" rel="stylesheet"/>
            <link href="../css/client.css" rel="stylesheet"/>
        </head>
        <body>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <header class="row page-header">
                        <div class="col-md-offset-1 col-md-10 titre"><h1>GESTION DE COMMANDES</h1></div>
                    </header>
                    <aside class="table-responsive">
                        <table class="table table-bordered table-striped ">
                            <caption>
                                <h4>Liste de tout les commandes</h4>
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
                                <xsl:for-each select="//ligne_commande">
                                <tr class="active"> 
                                    <td style="color:blue;"><xsl:value-of select="parent::commande/@no_client"/></td>
                                    <td style="color:red;"><xsl:value-of select="@no_ligne_commande"/></td>                 
                                    <td><xsl:value-of select="date_commande"/></td>
                                    <td><xsl:value-of select="designation"/></td>
                                    <td><xsl:value-of select="quantite_commande"/></td>
                                    <td><xsl:value-of select="paye"/></td>                            
                                </tr>
                                </xsl:for-each>
                            </tbody>
                        </table>
                    </aside>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="menu_cherche_commande.php" class="btn btn-success form-control" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                                    chercher
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="nouvelle_commande.php" class="btn btn-success form-control" type="submit">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                    enregistrer une autre commande
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="menu_filtre_commande.php" class="btn btn-success form-control" type="submit">
                                <span class="glyphicon glyphicon-filter"></span>
                                    filtrer
                            </a>
                        </div>
                    </div>
                    <footer class="row">
                        <div class="col-md-12">
                            <ul class="list-inline">
                                <li><small><a href="client.xml">liste de tous les clients</a></small></li>
                                <li><small><a href="commande.xml">liste de tout les commandes dans la base de donnees</a></small></li>
                                <li><small><a href="../VUES/chercher_client_par_id.php">modifier des informations d'un client</a></small></li>
                                <li><small><a href="../VUES/chercher_commande_par_id.php">modifier des informations d'une commande</a></small></li>
                                <li><small><a href="#">a propos</a></small></li>
                                <li><small><a href="../index.php">page d'accueil</a></small></li>
                            </ul>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </body>
    </html>
</xsl:template>
</xsl:stylesheet>
