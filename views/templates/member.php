<main class="py-5">
    <section class="d-flex flex-row gap-5 mt-5 w-75 m-auto">
        <div class="w-25">
            <div class="bg-white rounded-4 p-5 d-flex flex-column justify-content-between align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <?php if (!$user->getProfilePicture()) { ?>
                        <img src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill">
                    <?php } else { ?>
                        <img src="<?= $user->getProfilePicture() ?>" alt="Photo de profil" class="profile-pic rounded-pill">
                    <?php } ?>
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
                <a class="px-4 py-3 mt-5 btn btn-outline-success bg-yellow">Écrire un message</a>
            </div>
        </div>


        <div class="bg-white rounded-4 py-5 w-75 m-auto rounded-lg">
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
                            </tr>
                        </thead>
                        <tbody class="library-table">
                            <?php foreach ($books as $book) { ?>
                                <tr class="pointer" data-href="index.php?action=book&id=<?= htmlspecialchars($book->getId()) ?>">
                                    <td class="w-15 px-3 py-2">
                                        <div class="img-holder w-100 rounded" style="background-image : url(<?= htmlspecialchars($book->getImageUrl()) ?> )">
                                    </td>
                                    <td class="w-15 px-3 py-2 text-center"><?= htmlspecialchars($book->getTitle()) ?></td>
                                    <td class="w-15 px-3 py-2 text-center"><?= htmlspecialchars($book->getAuthor()) ?></td>
                                    <td class="px-3 py-2 fst-italic">
                                        <?php
                                        $description = $book->getDescription();

                                        if (strlen($description) > 150) {
                                            $description = substr($description, 0, 150) . '...';
                                        };

                                        echo htmlspecialchars($description);
                                        ?>
                                    </td>
                                    <td class="px-3 w-15 py-2 text-center">
                                        <?php if ($book->isAvailable()) { ?>
                                            <span class="label label-available px-2 py-1 rounded-pill">disponible</span>
                                        <?php } else { ?>
                                            <span class="label label-not-available p-2 py-1 rounded-pill">non dispo.</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="d-flex flex-column justify-content-between align-items-center">
                    <p>Ce membre n'a pas encore ajouté de livre.</p>
                </div>
            <?php } ?>
        </div>

    </section>

</main>

<script src="./js/member.js"></script>