<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom Troc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="pt-4 mb-2">
        <nav class="d-flex flex-row justify-content-around" aria-label="Navigation principale">
            <ul class="nav-left w-25 justify-content-between navbar-nav d-flex flex-row align-items-center">
                <li class="nav-item">
                    <a href="index.php" class="nav-link" title="Vers l'accueil"><img alt="Logo Tom Troc" src="<?= BASE_URL ?>/assets/logo.svg" /></a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link" title="Vers l'accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?action=books" class="nav-link" title="Voir les livres à l'échange">Nos livres à l'échange</a>
                </li>
            </ul>

            <ul class="nav-right w-25 justify-content-between navbar-nav d-flex flex-row-reverse align-items-center">
                <li class="nav-item">
                    <?php if (!empty($_SESSION['user'])): ?>
                        <a href="index.php?action=logout" class="nav-link" title="Se déconnecter">Se déconnecter</a>
                    <?php else: ?>
                        <a href="index.php?action=login" class="nav-link" title="Se connecter au site">Connexion</a>
                    <?php endif; ?>
                </li>
                <?php if (!empty($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a href="index.php?action=account" class="nav-link" title="Voir mon compte">Mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?action=mail" class="nav-link" title="Voir la messagerie">Messagerie</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <?= $content ?>

    <footer class="bg-light py-2">
        <nav class="d-flex justify-content-end">
            <ul class="navbar-nav d-flex flex-row align-items-center">
                <li class="nav-item mx-3">
                    <a title="Voir la politique de confidentialité" class="nav-link" href="#">Politique de confidentialité</a>
                </li>
                <li class="nav-item mx-3">
                    <a title="Voir les mentions légales" class="nav-link" href="#">Mentions légales</a>
                </li>
                <li class="mx-3">
                    Tom Troc©
                </li>
                <li class="nav-item mx-3">
                    <a title="Vers l'accueil" class="nav-link" href="index.php"><img alt="Logo Tom Troc" src="<?= BASE_URL ?>/assets/min-logo.svg" /></a>
                </li>
            </ul>
        </nav>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>