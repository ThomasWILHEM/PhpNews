<?php
$pageTitle = "Admin - PhpNews";
$cssFile = "admin.css";
$active = "admin";
require("header.php");
?>

<main class="main">
    <h2 class="adminTitle">Page admin</h2>
    <div class="m20-0">
        <h4 class="text-decoration-underline">Nombre de news</h4>
        <form class="row g-3 align-items-center" method="post">
            <div class="col-auto">
                <label for="newsnumber">Nombre de news à afficher par page :</label>
            </div>
            <div class="col-auto hstack gap-3">
                <input class="form-control" id="newsnumber" name="newsnumber" type="number" min="1" value="10" required>
                <input class="btn btn-primary" type="submit" value="Enregistrer">
            </div>
            <input type="hidden" name="action" value="modifierNbNews">
        </form>
    </div>

    <!-- Fenêtre modale -->
    <div class="modal fade" id="addSiteModal" tabindex="-1" aria-labelledby="addSiteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSiteModalLabel">Ajouter un flux RSS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="nomsite">Nom du site :</label>
                        <input class="form-control" type="text" name="nomsite" id="nomsite" required>
                    </div>
                    <div class="col mb-3">
                        <label for="liensite">Lien du site :</label>
                        <input class="form-control" type="url" name="liensite" id="liensite" required>
                    </div>
                    <div class="col mb-3">
                        <label for="logosite">Logo du site :</label>
                        <input class="form-control" type="url" name="logosite" id="logosite" required>
                    </div>
                    <div class="col">
                        <label for="fluxrss">Flux RSS du site :</label>
                        <input class="form-control" type="url" name="fluxrss" id="fluxrss" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col">
                        <input type="reset" class="btn btn-danger" value="Réinitialiser">
                    </div>
                    <input type="button" class="btn btn-secondary col-auto" data-bs-dismiss="modal" value="Fermer">
                    <input type="submit" class="btn btn-primary col-auto" value="Ajouter">
                </div>
                <input type="hidden" name="action" value="ajouterSite">
            </form>
        </div>
    </div>

    <div class="m20-0">
        <h4 class="text-decoration-underline">Sites référencés</h4>
        <!-- Bouton de la fenêtre modale -->
        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#addSiteModal">Ajouter
            un flux RSS
        </button>
        <ul class="listeSite">
            <?php
            if (!empty($tabSites)) {
                foreach ($tabSites as $site) {
                    ?>
                    <li class="site-item">
                        <div class="row m-0">
                            <div class="col">
                                <a class="btn" href="<?php echo $site->getLien(); ?>">
                                    <img height="20px" src="<?php echo $site->getLogo(); ?>">
                                    <span class="ml"><?php echo $site->getNom(); ?></span>
                                </a>

                            </div>
                            <div class="col-auto align-self-center">
                                <a
                                        href="index.php?action=supprimerSite&idWebsite=<?php echo $site->getFluxRSS(); ?>">
                                    <img width="24" height="24" src="Vues/assets/img/remove.png">
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            } else echo "<h3 class='text-center'>Aucune news à afficher</h3>";
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
