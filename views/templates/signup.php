<main class='flex-grow-1 d-flex flex-lg-row flex-column'>
    <div class="col-lg-6 col-12 d-flex flex-col align-items-center">
        <div class="m-auto col-lg-6 col-12">
            <h1 class="text-center text-lg-start mb-5 mt-5 mt-lg-0">Inscription</h1>

            <?php if (isset($_GET['error'])): ?>
                <p class="text-red"><?= htmlspecialchars($_GET['error']) ?></p>
            <?php endif; ?>

            <form class="col-lg-9 col-10 m-auto m-lg-0" action="index.php?action=register" method="post">
                <label class="text-grey mb-2" for="pseudo">Pseudo</label><br>
                <input class="form-control py-2" type="text" name="pseudo" id="pseudo" required><br><br>

                <label class="text-grey mb-2" for="email">Adresse email</label><br>
                <input class="form-control py-2" type="email" name="email" id="email" required><br><br>

                <label class="text-grey mb-2" for="password">Mot de passe</label><br>
                <input class="form-control py-2" type="password" name="password" id="password" required><br><br>

                <button class="main-button border-0 w-100" type="submit">S'inscrire</button>

                <p class="mt-5 mb-lg-0 mb-5">Déjà inscrit ? <a class="text-black underline-link" href="index.php?action=login">Connectez-vous</a>
            </form>
        </div>
    </div>
    <div class="col-lg-6 col-12 cover-img d-flex justify-content-center align-items-center">
        <img alt="" src="<?= BASE_URL ?>/assets/photos/login.webp" />
    </div>
</main>