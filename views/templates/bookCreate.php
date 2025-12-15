<form action="index.php?action=add-book" method="POST" enctype="multipart/form-data">
    <main class="p-4 gap-5 bg-lightgrey">

        <div class="col-lg-9 col-12 m-auto p-lg-4 m-4">
            <a href="index.php?action=account" class="text-grey" title="Voir mon compte">
                <img src="<?= BASE_URL ?>/assets/back-arrow.svg" /> retour</a>
            <h1 class="mt-lg-2 mb-lg-4 mb-2 py-4">Ajouter un livre</h1>
            <div class="gap-lg-0 gap-3 d-flex flex-lg-row flex-column align-items-start bg-white w-full rounded-4">
                <div class="col-lg-6 col-12 p-lg-5 p-3 flex flex-column">
                    <label for="cover_picture" class="form-label text-grey">Photo</label>
                    <img id="img_preview" class="w-100" src="<?= BASE_URL ?>/assets/books/default.webp" />
                    <input type="file" name="cover_picture" id="cover_picture" accept="image/*">
                    <button class="underline-link text-grey btn-light mt-2" id="img-button" name="update_picture_btn">modifier la photo</button>
                </div>

                <div class="col-lg-6 col-12 p-lg-5 p-3 m-auto">
                    <div class="mb-4">
                        <label for="title" class="form-label text-grey">Titre</label>
                        <input name="title" type="text" class="form-control bg-darkgrey py-2" required id="title" />
                    </div>
                    <div class="mb-4">
                        <label for="author" class="form-label text-grey">Auteur</label>
                        <input name="author" type="text" class="form-control bg-darkgrey py-2" required id="author" />
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label text-grey">Commentaire</label>
                        <textarea name="description" class="form-control bg-darkgrey py-2" required id="description" rows="10"></textarea>
                    </div>

                    <button class="my-5 main-button border-0 col-lg-9 col-12 text-center" type="submit" title="Valider">Valider</button>
                </div>
            </div>
        </div>
    </main>
</form>

<script src="./js/bookCoverInput.js"></script>