<?php
    $pageTitle = "Connexion - PhpNews";
    require("header.php")
?>

<main class="main">
    <section class="clean-block clean-form">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Connexion</h2>
            </div>
            <form method="post">
                <div class="mb-4"><label class="form-label" for="username">Nom d'utilisateur</label>
                    <input class="form-control item" type="text" id="username" name="username" required></div>
                <div class="mb-4"><label class="form-label" for="password">Mot de passe</label>
                    <input class="form-control" type="password" id="password" name="password" required></div>
                <button class="btn btn-primary" type="submit">Se connecter</button>
                <input type="hidden" name="action" value="connection">
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