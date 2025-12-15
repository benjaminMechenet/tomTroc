<main>
    <div class="bg-brown pt-lg-5 pb-5">
        <section class='col-12 col-lg-6 mx-auto gap-10 flex-lg-row flex-column-reverse d-flex align-items-center justify-content-between'>
            <div class=" col-10 col-lg-5 mx-auto mx-lg-0 pe-lg-5 me-lg-5">
                <h1>
                    Rejoignez nos lecteurs passionnés
                </h1>
                <p>
                    Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.
                </p>
                <a class="main-button text-center mt-4 col-12 col-lg-7" href="index.php?action=books" title="Voir les livres à l'échange">Découvrir</a>
            </div>
            <figure class="col-lg-6 col-12 text-end">
                <img class="w-100" src="<?= BASE_URL ?>/assets/photos/hamza.webp" />
                <figcaption class="pt-1 me-3 me-lg-0 text-grey fst-italic">Hamza</figcaption>
            </figure>
        </section>
    </div>

    <section class="bg-lightgrey d-flex flex-column py-5 align-items-center">
        <h2 class="my-lg-5 my-3 px-5 text-center">Les derniers livres ajoutés</h2>
        <div class="row row-cols-lg-4 row-cols-2 gx-5 gy-lg-5 gy-3 col-lg-9 col-12 p-2 p-lg-0 m-auto">
            <?php foreach ($books as $book) { ?>
                <div class="px-2 px-lg-3">
                    <a class="col border-0 card rounded-bottom-3 rounded-top-0 article" href="index.php?action=book&id=<?= htmlspecialchars($book->getId()) ?>">
                        <?php if ($book->getImageUrl()) { ?>
                            <div class="book-holder m-auto d-flex justify-content-center align-items-center">
                                <img class="w-100" alt="<?= htmlspecialchars($book->getTitle()) ?>" src="<?= htmlspecialchars($book->getImageUrl()) ?>" />
                            </div>
                        <?php } ?>
                        <div class="p-3">
                            <h3 class="fs-5"><?= htmlspecialchars($book->getTitle()) ?></h3>
                            <p class="text-grey"><?= htmlspecialchars($book->getAuthor()) ?></p>
                            <p class="text-grey fst-italic">Mis à disposition par : <?= htmlspecialchars($book->getUserPseudo()) ?> </p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <a class="my-5 main-button col-11 col-lg-2 text-center" href="index.php?action=books" title="Voir les livres à l'échange">Voir tous les livres</a>
    </section>

    <div class="bg-brown pt-lg-5 pb-5">
        <section class="d-flex flex-column py-lg-5 align-items-center col-11 col-lg-9 m-auto">
            <h2 class="my-5">Comment ça marche ?</h2>
            <p class="col-lg-6 col-11 text-center">Échanger des livres avec Tom Troc, c'est simple et amusant ! Suivez ces étapes pour commencer :</p>
            <div class="d-flex flex-row flex-wrap flex-lg-nowrap gap-3 mt-4">
                <div class="card col-lg-3 my-2 my-lg-0 p-5 border-0 text-center">Inscrivez-vous gratuitement sur notre plateforme.</div>
                <div class="card col-lg-3 my-2 my-lg-0 p-5 border-0 text-center">Ajoutez les livres que vous souhaitez échanger à votre profil.</div>
                <div class="card col-lg-3 my-2 my-lg-0 p-5 border-0 text-center">Parcourez les livres disponibles chez d'autres membres.</div>
                <div class="card col-lg-3 my-2 my-lg-0 p-5 border-0 text-center">Proposez un échange et discutez avec d'autres passionnés de lecture.</div>
            </div>
            <a class="my-5 secondary-button col-12 col-lg-3 text-center" href="index.php?action=books" title="Voir les livres à l'échange">Voir tous les livres</a>
        </section>
    </div>

    <img class="col-12 d-lg-block d-none" src="<?= BASE_URL ?>/assets/photos/banner.webp" />
    <img class="col-12 d-lg-none d-block" src="<?= BASE_URL ?>/assets/photos/banner-mobile.webp" />

    <div class="bg-brown pt-lg-5 pb-5">
        <section class="col-lg-3 col-10 py-lg-5 d-flex flex-column m-auto">
            <h2 class="py-5">Nos valeurs</h2>
            <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
            <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
            <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
            <div class="d-flex flex-row justify-content-between">
                <span class="text-grey fst-italic">L'équipe Tom Troc</span>
                <img src="<?= BASE_URL ?>/assets/coeur.svg" />
            </div>
        </section>
    </div>
</main>