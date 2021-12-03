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
<nav class="navbar navbar-light navbar-expand-lg bg-white clean-navbar navShadow">
    <div class="container">
        <a class="navbar-brand logo" href="index.php">PhpNews</a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link active" href="index.php?action=admin">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=deconnexion">Déconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="main">
    <h2 class="adminTitle">Page admin</h2>
    <div class="m20-0">
        <h4 class="text-decoration-underline">Nombre de news</h4>
        <div>
            <label for="newsnumber">Nombre de news à afficher par page :</label>
            <input id="newsnumber" type="number" min="1" max="30" value="10" required>
        </div>
    </div>

    <div class="m20-0">
        <h4 class="text-decoration-underline"> Ajouter un site </h4>
        <form method="post">
            <label for="nomsite">Nom du site : </label>
            <input style="margin: 0 20px 0 10px" type="text" name="nomsite" id="nomsite" required>
            <label for="liensite">Lien du site : </label>
            <input style="margin: 0 20px 0 10px" type="url" name="liensite" id="liensite" required>
            <label for="logosite">Logo du site : </label>
            <input style="margin: 0 20px 0 10px" type="url" name="logosite" id="logosite" required>
            <label for="fluxrss">Flux RSS du site : </label>
            <input style="margin: 0 20px 0 10px" type="url" name="fluxrss" id="fluxrss" required>
            <input style="margin-left: 30px" type="submit" value="Ajouter le site">
            <input type="hidden" name="action" value="ajouterSite">
        </form>
    </div>
    <div class="m20-0">
        <h4 class="text-decoration-underline">Sites référencés</h4>
        <ul class="listeSite m20-0">
            <?php
            if(!empty($tabSites)){
                foreach ($tabSites as $site) {
                    ?>
                    <li class="site-item">
                        <div class="row m-0">
                            <div class="col">
                                <a class="btn" href="<?php echo $site->getLienSite(); ?>">
                                    <img height="20px" src="<?php echo $site->getLogo(); ?>">
                                    <span class="ml"><?php echo $site->getNom(); ?></span>
                                </a>

                            </div>
                            <div class="col-sm-auto">
                                <a style="align-self: end"
                                   href="index.php?action=supprimerSite&idWebsite=<?php echo $site->getFluxRSS(); ?>">
                                    <img width="24" height="24" src="Vues/assets/img/remove.png">
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            else echo "<h3 class='text-center'>Aucune news à afficher</h3>";
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
