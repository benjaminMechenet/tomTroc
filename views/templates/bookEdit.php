<main class="p-4 gap-5 bg-light">

    <div class="w-75 m-auto p-4 m-4">
        <a href="index.php?action=account" class="text-grey" title="Voir mon compte">
            <img src="<?= BASE_URL ?>/assets/back-arrow.svg" /> retour</a>
        <h1 class="mt-2 mb-4 py-4">Modifier les informations</h1>
        <div class="gap-5 d-flex flex-row align-items-start bg-white w-full rounded-4">
            <div class="w-50 p-5 flex flex-column">
                <label for="imageUrl" class="form-label text-grey">Photo</label>
                <img id="img_preview" class="w-100" src="<?= $book->getImageUrl() ?>" />

                <form class="d-flex flex-column align-items-end" id="coverForm" action="index.php?action=update-cover&id=<?= htmlspecialchars($book->getId()) ?>" method="POST" enctype="multipart/form-data">
                    <input type="file" name="cover_picture" id="cover_picture" accept="image/*" required>
                    <button class="underline-link text-grey btn-light mt-2" type="submit" name="update_picture_btn">modifier la photo</button>
                </form>
            </div>

            <div class="w-50 p-5 m-auto">
                <form action="index.php?action=update-book&id=<?= htmlspecialchars($book->getId()) ?>" method="post">
                    <div class="mb-4">
                        <label for="title" class="form-label text-grey">Titre</label>
                        <input name="title" type="title" class="form-control bg-darkgrey py-2" id="title" value="<?= htmlspecialchars($book->getTitle()) ?>" />
                    </div>
                    <div class="mb-4">
                        <label for="author" class="form-label text-grey">Auteur</label>
                        <input name="author" type="author" class="form-control bg-darkgrey py-2" id="author" value="<?= htmlspecialchars($book->getAuthor()) ?>" />
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label text-grey">Commentaire</label>
                        <textarea name="description" type="description" class="form-control bg-darkgrey py-2" id="description" rows="10"><?= htmlspecialchars($book->getDescription()) ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="available" class="form-label text-grey">Disponibilité</label>
                        <select name="available" id="available" class="form-select bg-darkgrey py-2">
                            <option value="1" <?php if ($book->isAvailable()) { ?>selected="selected" <?php } ?>>disponible</option>
                            <option value="0" <?php if (!$book->isAvailable()) { ?>selected="selected" <?php } ?>>non disponible</option>
                        </select>
                    </div>

                    <button class="my-5 main-button border-0 w-75 text-center" title="Valider">Valider</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="./js/bookEdit.js"></script>