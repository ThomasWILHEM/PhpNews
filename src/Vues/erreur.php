<?php
$pageTitle = "Erreur - PhpNews";
//    $cssFile="";
require("header.php");
?>

<main class="main">
    <?php
    if (!empty($dVueErreur)) {
        echo "<h1 class='text-danger text-center'><b>Erreur !!</b></h1>";
        foreach ($dVueErreur as $error)
            echo("<h2 class='text-center'><b>" . $error . "</b></h2>");
    } else
        echo("<h1 class='text-center'><b>Aucune erreur</b></h1>");

    if (isset($_SESSION['previous']) && filter_var($_SESSION['previous'], FILTER_VALIDATE_URL))
        echo '<a href="' . $_SESSION['previous'] . '">Retour sur la page précédente</a>';
    else
        echo '<a href="index.php">Retour sur la page principale</a>';
    ?>
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