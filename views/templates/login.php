<main class='flex-grow-1 d-flex flex-row'>
    <div class="w-50 d-flex flex-col align-items-center">
        <div class="m-auto w-50">
            <h1 class="mb-5">Connexion</h1>

            <?php if (isset($_GET['error'])): ?>
                <p style="color:red"><?= htmlspecialchars($_GET['error']) ?></p>
            <?php endif; ?>

            <form class="w-75" action="index.php?action=signin" method="post">
                <label class="text-grey mb-2" for="email">Adresse email</label><br>
                <input class="form-control py-2" type="email" name="email" id="email" required><br><br>

                <label class="text-grey mb-2" for="password">Mot de passe</label><br>
                <input class="form-control py-2" type="password" name="password" id="password" required><br><br>

                <button class="main-button border-0 w-100" type="submit">Se connecter</button>

                <p class="mt-5">Pas de compte ? <a class="text-black underline-link" href="index.php?action=signup">Inscrivez-vous</a>
            </form>
        </div>
    </div>
    <div class="w-50 cover-img" style="background-image : url(<?= BASE_URL ?>/assets/photos/login.webp)">
    </div>
</main>