<main class="flex-grow-1 d-flex flex-row bg-light">
    <div class="w-50 cover-img" style="background-image : url(<?= $book->getImageUrl() ?> )">
    </div>

    <div class="w-50 m-auto">
        <h1><?= $book->getTitle() ?></h1>
        <h3 class="text-grey">par <?= $book->getAuthor() ?></h3>
        <h4>Description</h4>
        <p>
            <?= $book->getDescription() ?>
        </p>
        <h4>Propriétaire</h4>
        <p><?= $book->getUserId() ?></p>


    </div>
</main>