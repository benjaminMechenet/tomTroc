<main>
    <section class='w-50 mx-auto my-5 gap-10 d-flex align-items-center'>
        <div class="w-50 me-5">
            <h1>
                Rejoignez nos lecteurs passionnés
            </h1>
            <p>
                Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.
            </p>
            <a class="main-button" href="index.php?action=books" title="Voir les livres à l'échange">Découvrir</a>
        </div>
        <figure class="w-50 text-end">
            <img class="w-100" src="<?= BASE_URL ?>/assets/photos/hamza.webp" />
            <figcaption class="pt-1 text-grey fst-italic">Hamza</figcaption>
        </figure>
    </section>

    <section class="bg-light d-flex flex-column py-5 align-items-center">
        <h2 class="my-5">Les derniers livres ajoutés</h2>
        <div class="row row-cols-4 gx-5 gy-5 w-75 m-auto">
            <?php foreach ($books as $book) { ?>
                <div>
                    <a class="col border-0 card rounded-bottom-3 rounded-top-0 article" href="index.php?action=book&id=<?= $book->getId() ?>">
                        <div>
                            <div class="img-holder w-100" style="background-image : url(<?= $book->getImageUrl() ?> )">
                            </div>
                            <div class="p-3">
                                <h3 class="fs-5"><?= $book->getTitle() ?></h3>
                                <p class="text-grey"><?= $book->getAuthor() ?></p>
                                <p class="text-grey fst-italic">Mis à disposition par : <?= $book->getUserPseudo() ?> </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <a class="my-5 main-button" href="index.php?action=books" title="Voir les livres à l'échange">Voir tous les livres</a>
    </section>

    <section class="d-flex flex-column py-5 align-items-center w-75 m-auto">
        <h2 class="my-5">Comment ça marche ?</h2>
        <p class="w-50 text-center">Échanger des livres avec Tom Troc, c'est simple et amusant ! Suivez ces étapes pour commencer :</p>
        <div class="d-flex flex-row mt-4">
            <div class="card w-25 py-5 px-5 mx-3 border-0 text-center">Inscrivez-vous gratuitement sur notre plateforme.</div>
            <div class="card w-25 py-5 px-5 mx-3 border-0 text-center">Ajoutez les livres que vous souhaitez échanger à votre profil.</div>
            <div class="card w-25 py-5 px-5 mx-3 border-0 text-center">Parcourez les livres disponibles chez d'autres membres.</div>
            <div class="card w-25 py-5 px-5 mx-3 border-0 text-center">Proposez un échange et discutez avec d'autres passionnés de lecture.</div>
        </div>
        <a class="my-5 secondary-button" href="index.php?action=books" title="Voir les livres à l'échange">Voir tous les livres</a>
    </section>

    <img class="w-100" src="<?= BASE_URL ?>/assets/photos/banner.webp" />

    <section class="w-25 py-5 d-flex flex-column m-auto">
        <h2 class="py-5">Nos valeurs</h2>
        <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
        <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
        <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
        <div class="d-flex flex-row justify-content-between">
            <span class="text-grey fst-italic">L'équipe Tom Troc</span>
            <img src="<?= BASE_URL ?>/assets/coeur.svg" />
        </div>
    </section>
</main>