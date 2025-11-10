<main class="bg-light py-5">
    <div class="py-5 w-75 m-auto d-flex flex-row justify-content-between">
        <h1>Nos livres à l'échange</h1>
        <form action="/recherche" method="get" role="search">
            <label for="search" class="visually-hidden">Rechercher un livre</label>
            <input type="search" id="search" name="q" placeholder="Rechercher un livre" />
        </form>
    </div>

    <div class="row row-cols-4 gx-5 gy-5 w-75 m-auto">
        <?php foreach ($books as $book) { ?>
            <div>
                <a class="col border-0 card rounded-bottom-3 rounded-top-0 article" href="index.php?action=book&id=<?= htmlspecialchars($book->getId()) ?>">
                    <div>
                        <div class="img-holder w-100" style="background-image : url(<?= htmlspecialchars($book->getImageUrl()) ?> )">
                        </div>
                        <div class="p-3">
                            <h3 class="fs-5"><?= htmlspecialchars($book->getTitle()) ?></h3>
                            <p class="text-grey"><?= htmlspecialchars($book->getAuthor()) ?></p>
                            <p class="text-grey fst-italic">Mis à disposition par : <?= htmlspecialchars($book->getUserPseudo()) ?> </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</main>