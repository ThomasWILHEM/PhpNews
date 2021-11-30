<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Connexion - PhpNews</title>
        <link rel="stylesheet" href="Vues/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <link rel="stylesheet" href="Vues/assets/css/vanilla-zoom.min.css">
        <link rel="stylesheet" href="Vues/assets/css/login.css">
    </head>

    <body>
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container"><a class="navbar-brand logo" href="index.php">PhpNews</a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link active" href="indexAdmin.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="page login-page">
            <section class="clean-block clean-form">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info">Connexion</h2>
                    </div>
                    <form method="post">
                        <div class="mb-3"><label class="form-label" for="username">Nom d'utilisateur</label>
                            <input class="form-control item" type="text" id="username" name="username" required></div>
                        <div class="mb-3"><label class="form-label" for="password">Mot de passe</label>
                            <input class="form-control" type="password" id="password" name="password" required></div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkbox">
                                <label class="form-check-label" for="checkbox">Se souvenir de moi?</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Se connecter</button>
                        <input type="hidden" name="action" value="verifLogin">
                    </form>
                </div>
            </section>
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