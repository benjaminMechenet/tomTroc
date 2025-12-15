<main class="bg-lightgrey py-5 d-flex flex-column flex-grow-1">
    <div class="py-lg-5 py-3 col-lg-9 col-11 m-auto d-flex flex-lg-row flex-column justify-content-between">
        <h1>Nos livres à l'échange</h1>
        <form class="mt-3 mt-lg-0" role="search" onsubmit="event.preventDefault();">
            <label for="search" class="visually-hidden">Rechercher un livre</label>
            <input type="search" id="search" class="form-control py-2" name="q" placeholder="Rechercher un livre" />
        </form>
    </div>

    <div id='books' class="row row-cols-2 row-cols-lg-4 gx-5 gy-lg-5 gy-3 col-lg-9 col-12 p-2 p-lg-0 m-auto flex-grow-1">
        <?php foreach ($books as $book) { ?>
            <div class="book px-2 px-lg-3">
                <a class="col border-0 card rounded-bottom-3 rounded-top-0 article" href="index.php?action=book&id=<?= htmlspecialchars($book->getId()) ?>">
                    <?php if ($book->getImageUrl()) { ?>
                        <div class="book-holder m-auto d-flex justify-content-center align-items-center">
                            <img class="w-100" alt="<?= htmlspecialchars($book->getTitle()) ?>" src="<?= htmlspecialchars($book->getImageUrl()) ?>" />
                        </div>
                    <?php } ?>
                    <div class="p-3">
                        <h3 class="fs-6 fs-lg-5"><?= htmlspecialchars($book->getTitle()) ?></h3>
                        <p class="text-grey"><?= htmlspecialchars($book->getAuthor()) ?></p>
                        <p class="text-grey fst-italic">Mis à disposition par : <?= htmlspecialchars($book->getUserPseudo()) ?> </p>
                    </div>
                </a>
            </div>
        <?php } ?>

        <p id="alertNotice" class="d-none">Aucun livre ne correspond à votre recherche</p>
    </div>
</main>

<script src="./js/books.js"></script>