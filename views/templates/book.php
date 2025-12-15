<main class="flex-grow-1 gap-5 d-flex flex-lg-row flex-column bg-lightgrey">
    <div class="col-12 col-lg-6 cover-img d-flex justify-content-center align-items-center">
        <img src="<?= htmlspecialchars($book->getImageUrl()) ?>" />
    </div>

    <div class="col-lg-5 col-11 p-lg-5 p-3 m-auto">
        <h1 class="pb-3"><?= htmlspecialchars($book->getTitle()) ?></h1>
        <h3 class="text-grey pb-4 fs-5 font-light">par <?= htmlspecialchars($book->getAuthor()) ?></h3>

        <?php if ($book->isAvailable()) { ?>
            <span class="label label-available px-2 py-1 rounded-pill">disponible</span>
        <?php } else { ?>
            <span class="label label-not-available p-2 py-1 rounded-pill">non dispo.</span>
        <?php } ?>

        <hr class="separator pb-4" />
        <h4 class="text-sm pb-2 text-uppercase">Description</h4>
        <p class="col-lg-9 col-12 pb-5">
            <?= htmlspecialchars($book->getDescription()) ?>
        </p>
        <h4 class="text-sm pb-2 text-uppercase">Propriétaire</h4>
        <?php
        if (!$_SESSION || ($user->getId() !== $_SESSION['user']['id'])) { ?>
            <a href="index.php?action=member&id=<?= htmlspecialchars($user->getId()) ?>" class="d-block rounded-pill bg-white text-black ps-2 pe-3 py-2 fit-content">
                <?php if (!$user->getProfilePicture()) { ?>
                    <img width='35' height='35' src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill mr-2">
                <?php } else { ?>
                    <img width='35' height='35' src="<?= htmlspecialchars($user->getProfilePicture()) ?>" alt="Photo de profil" class="profile-pic rounded-pill mr-2">
                <?php } ?>
                <div class="ms-2 d-inline-block"><?= htmlspecialchars($user->getPseudo()) ?></div>
            </a>

            <a class="my-5 main-button col-lg-9 col-12 text-center" href="index.php?action=messenger&id=<?= htmlspecialchars($user->getId()) ?>" title="Envoyer un message à <?= htmlspecialchars($user->getPseudo()) ?>">Envoyer un message à <?= htmlspecialchars($user->getPseudo()) ?></a>
        <?php } else { ?>
            <div class="d-block rounded-pill bg-white text-black ps-2 pe-3 py-2 fit-content">
                <?php if (!$user->getProfilePicture()) { ?>
                    <img width='35' height='35' src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill mr-2">
                <?php } else { ?>
                    <img width='35' height='35' src="<?= htmlspecialchars($user->getProfilePicture()) ?>" alt="Photo de profil" class="profile-pic rounded-pill mr-2">
                <?php } ?>
                <div class="ms-2 d-inline-block"><?= htmlspecialchars($user->getPseudo()) ?></div>
            </div>
            <a class="my-5 main-button col-lg-9 col-12 text-center" href="index.php?action=account" title="Envoyer un message à <?= htmlspecialchars($user->getPseudo()) ?>">Accéder à votre bibliothèque</a>
        <?php } ?>

    </div>
</main>