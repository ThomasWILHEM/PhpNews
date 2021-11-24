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
    <link rel="stylesheet" href="assets/css/index.css">
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
                    <a class="nav-link" href="index.php?action=loginAdmin">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main class="page landing-page">
    <ul class="news-list">
        <?php
        foreach ($tabNews as $news){
            ?>
        <li class="news-item white">
            <p class="news-date"><?php echo $news->getDate() ?></p>
            <a href="index.php?action=click&redirectWebsite=https://www.jeuxvideo.com/" class="news-title news-link"><?php echo $news->getTitre() ?></a>
            <a href=""><img src="assets/img/pikachu.gif" class="news-img"></a>
            <a class="news-desc news-link" href="<?php echo $news->getLien() ?>"><?php echo $news->getDescription() ?></a>
        </li>
        <?php
        }
        ?>
    </ul>
</main>
<footer
    class="d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-xl-end page-footer dark">
    <p class="d-lg-flex justify-content-lg-center" style="text-align: center;color: rgb(255,255,255);">Florent
        MARQUES - G1 - Thomas WILHEM</p>
</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/vanilla-zoom.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>
