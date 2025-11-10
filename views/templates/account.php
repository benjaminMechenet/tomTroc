<main class="py-5">
    <h1 class="w-75 m-auto">Mon compte</h1>
    <section class="d-flex flex-row gap-5 mt-5 w-75 m-auto">
        <div class="w-50 bg-white rounded-4 p-5 d-flex flex-column justify-content-between align-items-center">
            <div class="d-flex flex-column align-items-center">
                <?php if (!$user->getProfilePicture()) { ?>
                    <img src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill">
                <?php } else { ?>
                    <img src="<?= $user->getProfilePicture() ?>" alt="Photo de profil" class="profile-pic rounded-pill">
                <?php } ?>
                <form id="profileForm" action="index.php?action=update-picture" method="POST" enctype="multipart/form-data">
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required>
                    <button class="underline-link text-grey btn-light mt-2" type="submit" name="update_picture_btn">modifier</button>
                </form>
            </div>
            <hr class='separator w-25'>
            <div>
                <h3 class="mt-3 text-center"><?= htmlspecialchars($user->getPseudo()) ?></h3>
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
                    <span class="text-black"><i class="bi bi-book me-1"></i> <?= count($books) ?> livres</span>
                </div>
            </div>
        </div>

        <div class="w-50 bg-white rounded-4 p-5">
            <div class="form-section px-5">
                <h5 class="mb-4">Vos informations personnelles</h5>

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

                    <button type="submit" class="px-4 py-3 btn btn-outline-success bg-yellow">Enregistrer</button>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-4 py-5 w-75 m-auto mt-5 rounded-lg">
        <?php if ($books) { ?>
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
                                    <div class="img-holder w-100 rounded" style="background-image : url(<?= htmlspecialchars($book->getImageUrl()) ?> )">
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
                                    <a href="#" class="me-3 underline-link text-grey">Éditer</a>
                                    <a href="index.php?action=delete-book&id=<?= htmlspecialchars($book->getId()) ?>" onclick="return confirm('Voulez-vous vraiment supprimerce livre ?')" class="text-danger underline-link">Supprimer</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="d-flex flex-column justify-content-between align-items-center">
                <p>Vous n'avez pas encore ajouté de livre.</p>
                <a class="main-button">Ajoutez votre premier livre</a>
            </div>
        <?php } ?>
    </section>
</main>

<script src="./js/account.js"></script>