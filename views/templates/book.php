<main class="flex-grow-1 gap-5 d-flex flex-row bg-light">
    <div class="w-50 cover-img" style="background-image : url(<?= $book->getImageUrl() ?> )">
    </div>

    <div class="w-50 p-5 m-auto">
        <h1 class="pb-3"><?= htmlspecialchars($book->getTitle()) ?></h1>
        <h3 class="text-grey pb-4 fs-5 font-light">par <?= htmlspecialchars($book->getAuthor()) ?></h3>

        <?php if ($book->isAvailable()) { ?>
            <span class="label label-available px-2 py-1 rounded-pill">disponible</span>
        <?php } else { ?>
            <span class="label label-not-available p-2 py-1 rounded-pill">non dispo.</span>
        <?php } ?>

        <hr class="separator pb-4" />
        <h4 class="text-sm pb-2 text-uppercase">Description</h4>
        <p class="w-75 pb-5">
            <?= htmlspecialchars($book->getDescription()) ?>
        </p>
        <h4 class="text-sm pb-2 text-uppercase">Propriétaire</h4>
        <a href="index.php?action=member&id=<?= htmlspecialchars($user->getId()) ?>" class="d-block rounded-pill bg-white text-black ps-2 pe-3 py-2 fit-content">
            <?php if (!$user->getProfilePicture()) { ?>
                <img width='35' height='35' src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill">
            <?php } else { ?>
                <img width='35' height='35' src="<?= $user->getProfilePicture() ?>" alt="Photo de profil" class="profile-pic rounded-pill">
            <?php } ?>
            <?= htmlspecialchars($user->getPseudo()) ?>
        </a>

        <a class="my-5 main-button w-75 text-center" href="index.php?action=message" title="Envoyer un message à <?= htmlspecialchars($user->getPseudo()) ?>">Envoyer un message à <?= htmlspecialchars($user->getPseudo()) ?></a>
    </div>
</main>