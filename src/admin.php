<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Accueil - PhpNews</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
        <link rel="stylesheet" href="assets/css/admin.css">
    </head>

    <body style="overflow-y: hidden">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container"><a class="navbar-brand logo" href="index.php">PhpNews</a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="page landing-page" style="height: 90%">
            <!-- Contenu de la page admin -->
            <h3>Page admin</h3>
            <div>
                <label for="newsnumber">Nombre de news à afficher:</label>
                <input id="newsnumber" type="number" min="5" max="50" value="20">
            </div>
            <div style="height: 80%">
                <h4>Sites référencés</h4>
                <form action="" method="post">
                    <label for="nomsite">Nom du site</label>
                    <input type="text" name="nomsite" id="nomsite">
                    <label for="lien">Lien du site</label>
                    <input type="url" name="lien" id="lien">
                    <label for="logo">Logo du site</label>
                    <input type="url" name="logo" id="logo">
                    <label for="fluxrss">Flux RSS du site</label>
                    <input type="url" name="fluxrss" id="fluxrss">
                    <input type="submit" name="ajouterSite" value="Ajouter le site">
                </form>
                <form action="" method="post">
                    <label for="searchfordelete">Site à supprimer</label>
                    <input type="text" name="searchfordelete" id="searchfordelete">
                    <input type="submit" name="supprimerSite" value="Supprimer le site">
                </form>
                <ul style="overflow-y: scroll; height: 90%; background-color: #f7f1e3;border: 1px solid black; border-radius: 10px; margin-right: 100px">
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
                    <li>el1</li>
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
