<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php if (isset($pageTitle) && !empty($pageTitle)) echo $pageTitle; else echo "PhpNews"; ?></title>
    <link rel="stylesheet" href="Vues/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="Vues/assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="Vues/assets/css/common.css">
    <?php if (isset($cssFile) && !empty($cssFile)) echo '<link rel="stylesheet" href="Vues/assets/css/' . $cssFile . '">' ?>
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
                <li class="nav-item"><a
                            class="nav-link <?php if (isset($active) && $active === "accueil") echo "active" ?>"
                            href="index.php">Accueil</a></li>
                <li class="nav-item"><a
                            class="nav-link <?php if (isset($active) && $active === "admin") echo "active" ?>"
                            href="index.php?action=admin">Admin</a></li>
                <?php if (isset($_SESSION['login'])) echo '<li><a class="nav-link btn btn-primary text-white" href="index.php?action=deconnexion">Déconnexion</a>' ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
