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

    <body style="overflow-y: hidden">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container"><a class="navbar-brand logo" href="index.php">PhpNews</a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="indexAdmin.php?action=loginAdmin">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="page landing-page" style="height: 80%">
            <!-- Contenu de la page admin -->
            <h2 style="text-align: center; margin-top: 40px ; font-weight: bold">Page admin</h2>
            <h4 style="margin-left: 1% ; text-decoration : underline" >Nombre de news</h4>
            <div style="margin: 20px 5%">
                <label for="newsnu mber">Nombre de news à afficher par page :</label>
                <input id="newsnumber" type="number" min="5" max="50" value="20">
            </div>

            <h4 style="margin-left: 1% ; text-decoration : underline">Sites référencés</h4>
            <div style="height: 80%  ; margin: 20px 5%">
                <h5> Ajouter un site </h5>
                <form method="post" style="margin: 20px">
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

                <h5> Supprimer un site </h5>
                <form method="post" style="margin: 20px">
                    <label for="searchfordelete">Site à supprimer : </label>
                    <input style="margin-left: 10px" type="text" name="searchfordelete" id="searchfordelete">
                    <input style="margin-left: 30px" type="submit" name="supprimerSite" value="Supprimer le site">
                    <input type="hidden" name="action" value="supprimerSite">
                </form>

                <ul style="overflow-y: scroll; height: 50%; background-color: #ededed;border: 1px solid black; border-radius: 10px; margin: 40px 50px 0 50px">
                    <?php
                    foreach ($tabSites as $site){
                        ?>
                        <li style="margin-top: 1%"> <img style="height: 20px" src="<?php echo $site->getLogo(); ?>"> <?php echo $site->getNom(); ?></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </main>
        <footer class="footer">
            <p class="footer-text">Florent MARQUES - G1 - Thomas WILHEM</p>
        </footer>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
        <script src="assets/js/vanilla-zoom.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>

</html>
