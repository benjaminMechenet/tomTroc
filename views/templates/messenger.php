<div class="bg-brown flex-grow-1 d-flex">
    <main class="d-flex flex-row justify-content-center mx-auto my-0 col-12 col-lg-9 position-relative">

        <div class="col-lg-3 col-12 h-auto bg-lightgrey">
            <h1 class="py-4 px-3 px-lg-4">Messagerie</h1>
            <?php if ($discussions) { ?>
                <table class="table align-middle">
                    <tbody class="discussion-table">
                        <?php foreach ($discussions as $discussion) { ?>
                            <tr class="pointer <?= ($member && $member->getId() === $discussion->getOtherUser()->getId()) ? 'active-discussion' : '' ?>" data-href="index.php?action=messenger&id=<?= htmlspecialchars($discussion->getOtherUser()->getId()) ?>">
                                <td class="px-4 px-lg-3 py-2 d-flex align-items-center">
                                    <?php if (!$discussion->getOtherUser()->getProfilePicture()) { ?>
                                        <img width='48' height='48' src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill">
                                    <?php } else { ?>
                                        <img width='48' height='48' src="<?= htmlspecialchars($discussion->getOtherUser()->getProfilePicture()) ?>" alt="Photo de profil" class="profile-pic rounded-pill">
                                    <?php } ?>
                                    <div class="d-flex flex-column w-100 ms-3 my-2">
                                        <div class="d-flex justify-content-between w-100">
                                            <span><?= htmlspecialchars($discussion->getOtherUser()->getPseudo()) ?></span>
                                            <span><?= htmlspecialchars($discussion->getMessage()->getSendedAt()->format('H:i')) ?></span>
                                        </div>
                                        <span class="text-grey">
                                            <?php
                                            $description = $discussion->getMessage()->getContent();
                                            if (strlen($description) > 60) {
                                                $description = substr($description, 0, 60) . '...';
                                            };
                                            echo htmlspecialchars($description);
                                            ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="p-4">Vous n'avez pas de conversation en cours</div>
            <?php  } ?>
        </div>

        <?php if ($member) { ?>
            <section class="col-12 position-absolute p-3 d-lg-none d-flex flex-column bg-lightgrey">
                <a href="index.php?action=messenger" class="text-grey" title="Voir mon compte">
                    <img src="<?= BASE_URL ?>/assets/back-arrow.svg" /> retour</a>
                <div class="flex-grow-1 d-flex flex-column mt-4">
                    <div class="d-flex align-items-center mb-3">
                        <a class="text-black" href="index.php?action=member&id=<?= htmlspecialchars($member->getId()) ?>">
                            <?php if (!$member->getProfilePicture()) { ?>
                                <img width='48' height='48' src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill">
                            <?php } else { ?>
                                <img width='48' height='48' src="<?= htmlspecialchars($member->getProfilePicture()) ?>" alt="Photo de profil" class="profile-pic rounded-pill">
                            <?php } ?>
                            <div class="ms-2 d-inline-block fs-5"><?= htmlspecialchars($member->getPseudo()) ?></div>
                        </a>
                    </div>
                    <div id='discussion-holder' class='discussion'>
                        <div id="messagesContainer" class="d-flex flex-column justify-content-end me-3">
                            <?php foreach ($messages as $message) { ?>
                                <?php if ($message->getSenderId() !== $user->getId()) { ?>
                                    <div class="recived col-11 col-lg-9 my-2">
                                        <div class="text-sm text-grey ms-2 d-flex flex-row align-items-center mb-2">
                                            <?php if (!$member->getProfilePicture()) { ?>
                                                <img width='24' height='24' src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill me-2">
                                            <?php } else { ?>
                                                <img width='24' height='24' src="<?= htmlspecialchars($member->getProfilePicture()) ?>" alt="Photo de profil" class="profile-pic rounded-pill me-2">
                                            <?php } ?>
                                            <?= htmlspecialchars($message->getSendedAt()->format('d.m H:i')) ?>
                                        </div>
                                        <p class="bg-white p-3 rounded">
                                            <?= htmlspecialchars($message->getContent()) ?>
                                        </p>
                                    </div>
                                <?php } else { ?>
                                    <div class="sended col-11 col-lg-9 align-self-end my-2">
                                        <div class="text-sm text-grey me-2 mb-2 text-end"><?= htmlspecialchars($message->getSendedAt()->format('d.m H:i')) ?></div>
                                        <p class="p-3 d-block bg-light-blue rounded">
                                            <?= htmlspecialchars($message->getContent()) ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <form id="messageForm" class="d-flex flex-column mt-4">
                        <input type="text" name="content" id="content" placeholder="Tapez votre message ici" class="flex-grow-1 form-control" required>
                        <button type="submit" class="main-button border-0 py-2 mt-3">Envoyer</button>
                    </form>
                </div>
            </section>
        <?php } ?>

        <section class="w-75 p-4 d-none d-lg-flex">
            <?php if ($member) { ?>
                <div class="flex-grow-1 d-flex flex-column">
                    <div class="d-flex align-items-center mb-3">
                        <a class="text-black" href="index.php?action=member&id=<?= htmlspecialchars($member->getId()) ?>">
                            <?php if (!$member->getProfilePicture()) { ?>
                                <img width='48' height='48' src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill">
                            <?php } else { ?>
                                <img width='48' height='48' src="<?= htmlspecialchars($member->getProfilePicture()) ?>" alt="Photo de profil" class="profile-pic rounded-pill">
                            <?php } ?>
                            <div class="ms-2 d-inline-block fs-5"><?= htmlspecialchars($member->getPseudo()) ?></div>
                        </a>
                    </div>
                    <div id='discussion-holder' class='discussion'>
                        <div id="messagesContainer" class="d-flex flex-column justify-content-end me-3">
                            <?php foreach ($messages as $message) { ?>
                                <?php if ($message->getSenderId() !== $user->getId()) { ?>
                                    <div class="recived w-75 my-2">
                                        <div class="text-sm text-grey ms-2 d-flex flex-row align-items-center mb-2">
                                            <?php if (!$member->getProfilePicture()) { ?>
                                                <img width='24' height='24' src="./assets/profil/profil.webp" alt="Photo de profil" class="profile-pic rounded-pill me-2">
                                            <?php } else { ?>
                                                <img width='24' height='24' src="<?= htmlspecialchars($member->getProfilePicture()) ?>" alt="Photo de profil" class="profile-pic rounded-pill me-2">
                                            <?php } ?>
                                            <?= htmlspecialchars($message->getSendedAt()->format('d.m H:i')) ?>
                                        </div>
                                        <p class="bg-white p-3 rounded">
                                            <?= htmlspecialchars($message->getContent()) ?>
                                        </p>
                                    </div>
                                <?php } else { ?>
                                    <div class="sended w-75 align-self-end my-2">
                                        <div class="text-sm text-grey me-2 mb-2 text-end"><?= htmlspecialchars($message->getSendedAt()->format('d.m H:i')) ?></div>
                                        <p class="p-3 d-block bg-light-blue rounded">
                                            <?= htmlspecialchars($message->getContent()) ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <form id="messageForm" class="d-flex mt-4">
                        <input type="text" name="content" id="content" placeholder="Tapez votre message ici" class="flex-grow-1 form-control" required>
                        <button type="submit" class="main-button border-0 py-2 ms-3">Envoyer</button>
                    </form>
                </div>
            <?php } ?>
        </section>
    </main>
</div>

<script src="./js/messager.js"></script>