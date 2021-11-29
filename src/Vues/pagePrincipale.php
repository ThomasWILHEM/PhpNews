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
    <div class="table-responsive m-2 border-5">
        <table class="table table-striped table-bordered border-dark">
            <thead>
            <th>Date de publication</th>
            <th>Titre</th>
            <th>Site</th>
            <th>Description</th>
            </thead>
        <?php
        for($i=0;$i<count($tabNews[0]);$i++){
            ?>
            <tr>
                <td class="news-td"><?php echo $tabNews[0][$i]->getDate() ?></td>
                <td class="news-td">
                    <a class="news-link"
                       href="index.php?action=click&redirectWebsite=<?php echo $tabNews[1][$i]->getLienSite() ?>">
                        <span><?php echo $tabNews[0][$i]->getTitre() ?></span>
                    </a>
                </td>
                <td class="news-td">
                    <a class="news-link" href="<?php echo $tabNews[1][$i]->getLienSite() ?>">
                        <img src="<?php echo $tabNews[1][$i]->getLogo() ?>" class="news-img" alt="Logo du site">
                        <?php echo $tabNews[1][$i]->getNom() ?>
                    </a>
                </td>
                <td class="news-td"><?php echo $tabNews[0][$i]->getDescription() ?></td>
            </tr>
        <?php
        }
        ?>

        </table>
    </div>
    <div style="display: flex; justify-content: center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($page>1){?>
                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page-1 ?>">Précédent</a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>
                <?php if($page<$nbPage){?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page+1 ?>">Suivant</a></li>
                <?php } ?>
            </ul>
        </nav>
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
