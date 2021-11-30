<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Accueil - PhpNews</title>
        <link rel="stylesheet" href="Vues/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <link rel="stylesheet" href="Vues/assets/css/vanilla-zoom.min.css">
        <link rel="stylesheet" href="Vues/assets/css/admin.css">
    </head>

    <body>
        <nav class="navbar navbar-light navbar-expand-lg bg-white clean-navbar" style="box-shadow: 0px 0px 15px rgb(0 0 0 / 10%);">
            <div class="container">
                <a class="navbar-brand logo" href="index.php">PhpNews</a>
                <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                    <span class="visually-hidden">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="indexAdmin.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main style="margin: auto">
            <h2 style="text-align: center; margin-top: 40px ; font-weight: bold">Page admin</h2>
            <h4 style="margin-left: 1% ; text-decoration : underline" >Nombre de news</h4>
            <div style="margin: 20px 5%">
                <label for="newsnumber">Nombre de news à afficher par page :</label>
                <input id="newsnumber" type="number" min="5" max="50" value="20">
            </div>

            <h4 style="margin-left: 1% ; text-decoration : underline">Sites référencés</h4>
            <div style="margin: 20px 5%">
                <h5> Ajouter un site </h5>
                <form action="" method="post" style="margin: 20px">
                    <label for="nomsite">Nom du site : </label>
                    <input style="margin: 0 20px 0 10px" type="text" name="nomsite" id="nomsite">
                    <label for="liensite">Lien du site : </label>
                    <input style="margin: 0 20px 0 10px" type="url" name="liensite" id="liensite">
                    <label for="logosite">Logo du site : </label>
                    <input style="margin: 0 20px 0 10px" type="url" name="logosite" id="logosite">
                    <label for="fluxrss">Flux RSS du site : </label>
                    <input style="margin: 0 20px 0 10px" type="url" name="fluxrss" id="fluxrss">
                    <input style="margin-left: 30px" type="submit" value="Ajouter le site">
                    <input type="hidden" name="action" value="ajouterSite">
                </form>

                <ul style="background-color: #ededed;border: 1px solid black; border-radius: 10px; margin: 40px 50px">
                    <?php
                    foreach ($tabSites as $site){
                        ?>
                        <li class="site-item">
                            <div style="width: 100%">
                                <div class="row m-0">
                                    <div class="col">
                                        <img style="height: 20px" src="<?php echo $site->getLogo(); ?>">
                                        <span><?php echo $site->getNom(); ?></span>
                                    </div>
                                    <div class="col-sm-auto">
                                        <a style="align-self: end" href="indexAdmin.php?action=supprimerSite&idWebsite=<?php echo $site->getFluxRSS(); ?>">
                                            <img width="24" height="24" src="Vues/assets/img/remove.png">
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </main>
        <footer class="footer">
            <p class="footer-text">Florent MARQUES - G1 - Thomas WILHEM</p>
        </footer>
        <script src="Vues/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
        <script src="Vues/assets/js/vanilla-zoom.js"></script>
        <script src="Vues/assets/js/theme.js"></script>
    </body>

</html>
