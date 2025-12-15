<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom Troc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="pt-3 pb-2 d-none d-lg-block">
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

            <ul class="nav-right w-25 gap-5 navbar-nav d-flex flex-row-reverse align-items-center">
                <li class="nav-item">
                    <?php if (!empty($_SESSION['user'])): ?>
                        <a href="index.php?action=logout" class="nav-link" title="Se déconnecter">Se déconnecter</a>
                    <?php else: ?>
                        <a href="index.php?action=login" class="nav-link" title="Se connecter au site">
                            Connexion</a>
                    <?php endif; ?>
                </li>
                <?php if (!empty($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a href="index.php?action=account" class="nav-link" title="Voir mon compte">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" aria-hidden="true" height="13" viewBox="0 0 10 13" fill="none" class="me-1">
                                <mask id="path-1-inside-1_21475_629" fill="white">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64286 9.28571C7.20704 9.28571 9.28571 7.20704 9.28571 4.64286C9.28571 2.07868 7.20704 0 4.64286 0C2.07868 0 0 2.07868 0 4.64286C0 7.20704 2.07868 9.28571 4.64286 9.28571ZM4.64286 9.28571C2.07868 9.28571 0 10.1172 0 11.1429C0 12.1685 2.07868 13 4.64286 13C7.20704 13 9.28571 12.1685 9.28571 11.1429C9.28571 10.1172 7.20704 9.28571 4.64286 9.28571Z" />
                                </mask>
                                <path d="M8.57571 4.64286C8.57571 6.81491 6.81491 8.57571 4.64286 8.57571V9.99571C7.59916 9.99571 9.99571 7.59916 9.99571 4.64286H8.57571ZM4.64286 0.71C6.81491 0.71 8.57571 2.4708 8.57571 4.64286H9.99571C9.99571 1.68656 7.59916 -0.71 4.64286 -0.71V0.71ZM0.71 4.64286C0.71 2.4708 2.4708 0.71 4.64286 0.71V-0.71C1.68656 -0.71 -0.71 1.68656 -0.71 4.64286H0.71ZM4.64286 8.57571C2.4708 8.57571 0.71 6.81491 0.71 4.64286H-0.71C-0.71 7.59916 1.68656 9.99571 4.64286 9.99571V8.57571ZM4.64286 8.57571C3.29356 8.57571 2.03931 8.79318 1.09617 9.17044C0.626573 9.35828 0.198899 9.59971 -0.122988 9.90412C-0.446374 10.2099 -0.71 10.6283 -0.71 11.1429H0.71C0.71 11.1387 0.710228 11.1236 0.726416 11.0919C0.744081 11.0574 0.780818 11.0038 0.852705 10.9358C1.0007 10.7959 1.25296 10.6371 1.62355 10.4889C2.36079 10.194 3.42797 9.99571 4.64286 9.99571V8.57571ZM-0.71 11.1429C-0.71 11.6574 -0.446374 12.0758 -0.122988 12.3816C0.198899 12.686 0.626573 12.9274 1.09617 13.1153C2.03931 13.4925 3.29356 13.71 4.64286 13.71V12.29C3.42797 12.29 2.36079 12.0917 1.62355 11.7968C1.25296 11.6486 1.0007 11.4898 0.852705 11.3499C0.780818 11.2819 0.744081 11.2283 0.726416 11.1938C0.710228 11.1621 0.71 11.147 0.71 11.1429H-0.71ZM4.64286 13.71C5.99215 13.71 7.2464 13.4925 8.18954 13.1153C8.65914 12.9274 9.08682 12.686 9.4087 12.3816C9.73209 12.0758 9.99571 11.6574 9.99571 11.1429H8.57571C8.57571 11.147 8.57549 11.1621 8.5593 11.1938C8.54163 11.2283 8.5049 11.2819 8.43301 11.3499C8.28501 11.4898 8.03276 11.6486 7.66217 11.7968C6.92492 12.0917 5.85774 12.29 4.64286 12.29V13.71ZM9.99571 11.1429C9.99571 10.6283 9.73209 10.2099 9.4087 9.90412C9.08682 9.59971 8.65914 9.35828 8.18954 9.17044C7.2464 8.79318 5.99215 8.57571 4.64286 8.57571V9.99571C5.85774 9.99571 6.92492 10.194 7.66217 10.4889C8.03276 10.6371 8.28501 10.7959 8.43301 10.9358C8.5049 11.0038 8.54163 11.0574 8.5593 11.0919C8.57549 11.1236 8.57571 11.1387 8.57571 11.1429H9.99571Z" fill="#292929" mask="url(#path-1-inside-1_21475_629)" />
                            </svg>
                            Mon compte
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?action=messenger" class="nav-link" title="Voir la messagerie">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="15" height="14" viewBox="0 0 15 14" fill="none" class="me-1">
                                <path d="M7.5 0.355469C11.4954 0.355469 14.6445 3.15221 14.6445 6.5C14.6445 8.19467 13.8458 9.73887 12.5342 10.8594L12.3184 11.0439L12.4443 11.2812V12.7334L11.1797 12.0029L11.0117 11.8555L10.8037 11.9492C9.8171 12.3929 8.6938 12.6445 7.5 12.6445C3.50458 12.6445 0.355469 9.84779 0.355469 6.5C0.355469 3.15221 3.50458 0.355469 7.5 0.355469Z" stroke="#292929" stroke-width="0.71" />
                            </svg>
                            Messagerie</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="index.php?action=signup" class="nav-link" title="S'inscrire">M'inscrire</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <header class="py-3 d-block d-lg-none">
        <nav class="container-fluid d-flex justify-content-between align-items-center"
            aria-label="Navigation principale">

            <a href="index.php" class="nav-link p-0" title="Vers l'accueil">
                <img alt="Logo Tom Troc" src="<?= BASE_URL ?>/assets/logo.svg" height="42">
            </a>

            <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu"
                aria-controls="mobileMenu"
                aria-label="Ouvrir le menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="15" viewBox="0 0 22 15" fill="none">
                    <path d="M0 0.5C0 0.223858 0.223858 0 0.5 0H21.5C21.7761 0 22 0.223858 22 0.5C22 0.776142 21.7761 1 21.5 1H0.5C0.223858 1 0 0.776142 0 0.5Z" fill="#A6A6A6" />
                    <path d="M0 7.5C0 7.22386 0.223858 7 0.5 7H21.5C21.7761 7 22 7.22386 22 7.5C22 7.77614 21.7761 8 21.5 8H0.5C0.223858 8 0 7.77614 0 7.5Z" fill="#A6A6A6" />
                    <path d="M0.5 14C0.223858 14 0 14.2239 0 14.5C0 14.7761 0.223858 15 0.5 15H21.5C21.7761 15 22 14.7761 22 14.5C22 14.2239 21.7761 14 21.5 14H0.5Z" fill="#A6A6A6" />
                </svg>
            </button>
        </nav>
    </header>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title fs-5" id="mobileMenuLabel">Menu</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                aria-label="Fermer le menu"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?action=books" class="nav-link">
                        Nos livres à l'échange
                    </a>
                </li>
                <?php if (!empty($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a href="index.php?action=account" class="nav-link">
                            Mon compte
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?action=messenger" class="nav-link">
                            Messagerie
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?action=logout" class="nav-link">
                            Se déconnecter
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="index.php?action=login" class="nav-link">
                            Connexion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?action=signup" class="nav-link">
                            M'inscrire
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <?= $content ?>

    <footer class="py-lg-2 py-4">
        <nav class="d-flex justify-content-center justify-content-lg-end">
            <ul class="navbar-nav d-flex flex-column flex-lg-row align-items-center">
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