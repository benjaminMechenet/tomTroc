<main class="py-5">
    <h1 class="col-11 col-lg-9 m-auto">Mon compte</h1>
    <section class="d-flex flex-lg-row flex-column gap-5 mt-5 col-11 col-lg-9 m-auto">
        <div class="col-12 col-lg-6 bg-white rounded-4 p-5 d-flex flex-column justify-content-between align-items-center">
            <div class="d-flex flex-column align-items-center">
                <?php if (!$user->getProfilePicture()) { ?>
                    <img src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill">
                <?php } else { ?>
                    <img src="<?= htmlspecialchars($user->getProfilePicture()) ?>" alt="Photo de profil" class="profile-pic rounded-pill">
                <?php } ?>
                <form id="profileForm" action="index.php?action=update-picture" method="POST" enctype="multipart/form-data">
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required>
                    <button class="underline-link text-grey btn-light mt-2" type="submit" name="update_picture_btn">modifier</button>
                </form>
            </div>
            <hr class='separator col-8'>
            <div>
                <h3 class="mt-3 text-center font-playfair"><?= htmlspecialchars($user->getPseudo()) ?></h3>
                <div class="d-flex flex-column align-items-center text-grey mb-1">Membre depuis

                    <?php
                    $today = new DateTime();

                    $interval = $today->diff($user->getCreatedAt());
                    $nbYear = $interval->y;

                    if ($nbYear === 0) {
                        echo "moins d'un an";
                    } else {
                        echo "$nbYear an" . ($nbYear > 1 ? "s" : "");
                    } ?>

                    <span class="mt-3 text-sm text-uppercase text-black">Bibliothèque</span>
                    <span class="text-black d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="14" viewBox="0 0 11 14" fill="none" class="me-1">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.46556 0.160154L7.2112 0.00251429C6.65202 -0.0365878 6.16701 0.385024 6.12791 0.944207L5.32192 12.4705C5.28281 13.0296 5.70442 13.5147 6.26361 13.5538L8.51796 13.7114C9.07715 13.7505 9.56215 13.3289 9.60125 12.7697L10.4072 1.24345C10.4464 0.684262 10.0247 0.199256 9.46556 0.160154ZM6.84113 0.99408C6.85269 0.828798 6.99605 0.70418 7.16133 0.715737L9.41568 0.873377C9.58096 0.884935 9.70558 1.02829 9.69403 1.19357L8.88803 12.7198C8.87647 12.8851 8.73312 13.0097 8.56783 12.9982L6.31348 12.8405C6.1482 12.829 6.02358 12.6856 6.03514 12.5203L6.84113 0.99408Z" fill="#292929" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.27482 0.0648067H1.01496C0.454414 0.0648067 0 0.519224 0 1.07977V12.6342C0 13.1947 0.454416 13.6491 1.01496 13.6491H3.27482C3.83537 13.6491 4.28979 13.1947 4.28979 12.6342V1.07977C4.28979 0.519221 3.83537 0.0648067 3.27482 0.0648067ZM0.714965 1.07977C0.714965 0.914086 0.849279 0.779771 1.01496 0.779771H3.27482C3.44051 0.779771 3.57482 0.914086 3.57482 1.07977V12.6342C3.57482 12.7999 3.44051 12.9342 3.27482 12.9342H1.01496C0.849279 12.9342 0.714965 12.7999 0.714965 12.6342V1.07977Z" fill="#292929" />
                        </svg> <?= count($books) ?>
                        livres
                    </span>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 bg-white rounded-4 p-5">
            <div class="form-section px-lg-5">
                <h5 class="text-center text-lg-start mb-4">Vos informations personnelles</h5>

                <form action="index.php?action=update-account" method="post">
                    <div class="mb-4">
                        <label for="email" class="form-label text-grey">Adresse email</label>
                        <input name="email" type="email" class="form-control bg-darkgrey py-2" id="email" value="<?= htmlspecialchars($user->getEmail()) ?>" />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label text-grey">Mot de passe</label>
                        <input type="password" class="form-control bg-darkgrey py-2" name="password" id="password" value="•••••••">
                    </div>

                    <div class="mb-4">
                        <label for="pseudo" class="form-label text-grey">Pseudo</label>
                        <input type="text" class="form-control bg-darkgrey py-2" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>">
                    </div>

                    <button type="submit" class="px-4 py-3 btn btn-outline-success bg-yellow col-12 col-lg-4">Enregistrer</button>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-white d-none d-lg-block rounded-4 pt-4 pb-3 col-9 m-auto mt-5 rounded-lg">
        <?php if ($books) { ?>
            <div class="text-center">
                <a href="index.php?action=create-book" class="px-4 py-3 mb-5 btn btn-outline-success bg-yellow">Ajouter un livre</a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th class="text-sm text-uppercase text-center">Photo</th>
                            <th class="text-sm text-uppercase text-center">Titre</th>
                            <th class="text-sm text-uppercase text-center">Auteur</th>
                            <th class="text-sm text-uppercase text-center">Description</th>
                            <th class="text-sm text-uppercase text-center">Disponibilité</th>
                            <th class="text-sm text-uppercase text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="library-table">
                        <?php foreach ($books as $book) { ?>
                            <tr>
                                <td class="px-3 py-2">
                                    <?php if ($book->getImageUrl()) { ?>
                                        <div class="img-holder rounded m-auto d-flex justify-content-center align-items-center">
                                            <img class="w-100" alt='<?= htmlspecialchars($book->getTitle()) ?>' src="<?= htmlspecialchars($book->getImageUrl()) ?>" />
                                        </div>
                                    <?php } ?>
                                </td>
                                <td class="w-15 px-3 py-2 text-center"><?= htmlspecialchars($book->getTitle()) ?></td>
                                <td class="w-15 px-3 py-2 text-center"><?= htmlspecialchars($book->getAuthor()) ?></td>
                                <td class="w-25 px-3 py-2 fst-italic">
                                    <?php
                                    $description = $book->getDescription();

                                    if (strlen($description) > 150) {
                                        $description = substr($description, 0, 150) . '...';
                                    };

                                    echo htmlspecialchars($description);
                                    ?>
                                </td>
                                <td class="px-3 py-2 text-center">
                                    <?php if ($book->isAvailable()) { ?>
                                        <span class="pointer label label-available px-2 py-1 rounded-pill" data-id="<?= htmlspecialchars($book->getId()) ?>">disponible</span>
                                    <?php } else { ?>
                                        <span class="pointer label label-not-available p-2 py-1 rounded-pill" data-id="<?= htmlspecialchars($book->getId()) ?>">non dispo.</span>
                                    <?php } ?>
                                </td>
                                <td class="px-3 py-2 text-center">
                                    <a href="index.php?action=bookEdit&id=<?= htmlspecialchars($book->getId()) ?>" class="me-3 underline-link text-grey">Éditer</a>
                                    <a href="index.php?action=delete-book&id=<?= htmlspecialchars($book->getId()) ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?')" class="text-danger underline-link">Supprimer</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="d-flex flex-column justify-content-between align-items-center">
                <p>Vous n'avez pas encore ajouté de livre.</p>
                <a class="main-button" href="index.php?action=create-book">Ajoutez votre premier livre</a>
            </div>
        <?php } ?>
    </section>

    <section class="d-lg-none d-block pt-4 pb-3 col-11 col-lg-9 m-auto mt-5 rounded-lg">
        <?php if ($books) { ?>
            <div class="text-center">
                <a href="index.php?action=create-book" class="px-4 py-3 mb-5 main-button">Ajouter un livre</a>
            </div>


            <?php foreach ($books as $book) { ?>
                <div class="bg-white rounded-4 p-5 mb-5">
                    <div class="d-flex">
                        <?php if ($book->getImageUrl()) { ?>
                            <div class="img-holder d-flex justify-content-center align-items-center">
                                <img class="w-100" alt='<?= htmlspecialchars($book->getTitle()) ?>' src="<?= htmlspecialchars($book->getImageUrl()) ?>" />
                            </div>
                        <?php } ?>
                        <div class="ms-3">
                            <p class="mb-1"><?= htmlspecialchars($book->getTitle()) ?></p>
                            <p class="mb-1"><?= htmlspecialchars($book->getAuthor()) ?></p>
                            <td class="text-center">
                                <?php if ($book->isAvailable()) { ?>
                                    <span class="pointer label label-available px-2 py-1 rounded-pill" data-id="<?= htmlspecialchars($book->getId()) ?>">disponible</span>
                                <?php } else { ?>
                                    <span class="pointer label label-not-available p-2 py-1 rounded-pill" data-id="<?= htmlspecialchars($book->getId()) ?>">non dispo.</span>
                                <?php } ?>
                            </td>
                        </div>
                    </div>


                    <div class="pt-3 fst-italic">
                        <?php
                        $description = $book->getDescription();

                        if (strlen($description) > 150) {
                            $description = substr($description, 0, 150) . '...';
                        };

                        echo htmlspecialchars($description);
                        ?>
                    </div>


                    <div class="pt-5 text-center">
                        <a href="index.php?action=bookEdit&id=<?= htmlspecialchars($book->getId()) ?>" class="me-3 underline-link text-grey">Éditer</a>
                        <a href="index.php?action=delete-book&id=<?= htmlspecialchars($book->getId()) ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?')" class="text-danger underline-link">Supprimer</a>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="d-flex flex-column justify-content-between align-items-center">
                <p>Vous n'avez pas encore ajouté de livre.</p>
                <a class="main-button" href="index.php?action=create-book">Ajoutez votre premier livre</a>
            </div>
        <?php } ?>
    </section>
</main>

<script src="./js/account.js"></script>