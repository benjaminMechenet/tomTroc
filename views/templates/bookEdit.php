<form action="index.php?action=update-book&id=<?= htmlspecialchars($book->getId()) ?>" method="POST" enctype="multipart/form-data">
    <main class="p-4 gap-5 bg-lightgrey">

        <div class="col-lg-9 col-12 m-auto p-lg-4 m-4">
            <a href="index.php?action=account" class="text-grey" title="Voir mon compte">
                <img src="<?= BASE_URL ?>/assets/back-arrow.svg" alt="" /> retour</a>
            <h1 class="mt-lg-2 mb-lg-4 mb-2 py-4">Modifier les informations</h1>
            <div class="gap-lg-0 gap-3 d-flex flex-lg-row flex-column align-items-start bg-white w-full rounded-4">
                <div class="col-lg-6 col-12 p-lg-5 p-3 flex flex-column">
                    <label for="cover_picture" class="form-label text-grey">Photo</label>
                    <img id="img_preview" class="w-100" alt="<?= htmlspecialchars($book->getImageUrl()) ?>" src="<?= htmlspecialchars($book->getImageUrl()) ?>" />
                    <input type="file" name="cover_picture" id="cover_picture" accept="image/*">
                    <button class="underline-link text-grey btn-light mt-2" id="img-button" name="update_picture_btn">modifier la photo</button>
                </div>

                <div class="col-lg-6 col-12 p-lg-5 p-3 m-auto">
                    <div class="mb-4">
                        <label for="title" class="form-label text-grey">Titre</label>
                        <input name="title" type="text" class="form-control bg-darkgrey py-2" id="title" value="<?= htmlspecialchars($book->getTitle()) ?>" />
                    </div>
                    <div class="mb-4">
                        <label for="author" class="form-label text-grey">Auteur</label>
                        <input name="author" type="text" class="form-control bg-darkgrey py-2" id="author" value="<?= htmlspecialchars($book->getAuthor()) ?>" />
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label text-grey">Commentaire</label>
                        <textarea name="description" class="form-control bg-darkgrey py-2" id="description" rows="10"><?= htmlspecialchars($book->getDescription()) ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="available" class="form-label text-grey">Disponibilité</label>
                        <select name="available" id="available" class="form-select bg-darkgrey py-2">
                            <option value="1" <?php if ($book->isAvailable()) { ?>selected="selected" <?php } ?>>disponible</option>
                            <option value="0" <?php if (!$book->isAvailable()) { ?>selected="selected" <?php } ?>>non disponible</option>
                        </select>
                    </div>

                    <button class="my-5 main-button border-0 col-lg-9 col-12 text-center" type="submit" title="Valider">Valider</button>
                </div>
            </div>
        </div>
    </main>
</form>

<script src="./js/bookCoverInput.js"></script>