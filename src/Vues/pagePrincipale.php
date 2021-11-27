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
    <link rel="stylesheet" href="Vues/assets/css/index.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="">PhpNews</a><button data-bs-toggle="collapse"
                                                                                   class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="indexAdmin.php">Admin</a>

                </li>
            </ul>
        </div>
    </div>
</nav>
<main class="page landing-page">
    <ul class="news-list">
        <?php
        for($i=0;$i<count($tabNews[0]);$i++){
            ?>
        <li class="news-item">
            <p class="news-date"><?php echo $tabNews[0][$i]->getDate() ?></p>
            <a href="index.php?action=click&redirectWebsite=<?php echo $tabNews[1][$i]->getLienSite() ?>" class="news-title news-link"><?php echo $tabNews[0][$i]->getTitre() ?></a>
            <a href="<?php echo $tabNews[1][$i]->getLienSite() ?>"><img src="<?php echo $tabNews[1][$i]->getLogo() ?>" class="news-img"></a>
            <a class="news-desc news-link" href="<?php echo $tabNews[0][$i]->getLien() ?>"><?php echo $tabNews[0][$i]->getDescription() ?></a>
        </li>
        <?php
        }
        ?>
    </ul>
    <div>
        <?php if($page>1){?>
            <a href="index.php?page=<?php echo $page-1 ?>"><-</a>
        <?php }
        ?>
        <span><?php echo $page ?></span>
        <?php if($page<$nbPage){?>
            <a href="index.php?page=<?php echo $page+1 ?>">-></a>
        <?php }
        ?>
    </div>
</main>
<footer
    class="d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-xl-end page-footer dark footer">
    <p class="d-lg-flex justify-content-lg-center footer-text" style="text-align: center;color: rgb(255,255,255);">Florent
        MARQUES - G1 - Thomas WILHEM</p>
</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/vanilla-zoom.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>
