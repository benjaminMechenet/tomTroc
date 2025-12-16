<div class="bg-brown flex-grow-1 d-flex">
    <main class="d-flex flex-row mx-auto my-0 col-12 col-lg-9 position-relative">

        <div class="col-lg-3 col-12 h-auto bg-lightgrey">
            <h1 class="py-4 px-3 px-lg-4">Messagerie</h1>
            <?php if ($discussions) { ?>
                <table class="table align-middle">
                    <tbody class="discussion-table">
                        <?php foreach ($discussions as $discussion) { ?>
                            <tr id=<?= htmlspecialchars($discussion->getOtherUser()->getId()) ?> class="pointer <?= ($member && $member->getId() === $discussion->getOtherUser()->getId()) ? 'active-discussion' : '' ?>" data-href="index.php?action=messenger&id=<?= htmlspecialchars($discussion->getOtherUser()->getId()) ?>">
                                <td class="px-4 px-lg-3 py-2 d-flex align-items-center">
                                    <?php $profilePic = $discussion->getOtherUser()->getProfilePicture() ?: './assets/profil/profil.webp'; ?>
                                    <img width='48' height='48' src="<?= htmlspecialchars($profilePic) ?>" alt="Photo de profil" class="profile-pic rounded-pill">
                                    <div class="d-flex flex-column w-100 ms-3 my-2">
                                        <div class="d-flex justify-content-between w-100">
                                            <span><?= htmlspecialchars($discussion->getOtherUser()->getPseudo()) ?></span>
                                            <span><?= htmlspecialchars($discussion->getMessage()->getSendedAt()->format('H:i')) ?></span>
                                        </div>
                                        <span class="text-grey">
                                            <?php
                                            $description = $discussion->getMessage()->getContent();
                                            if (strlen($description) > 60) $description = substr($description, 0, 60) . '...';
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
            <?php } ?>
        </div>

        <?php if ($member) { ?>
            <section class="col-12 col-lg-9 message-holder p-3 d-flex flex-column bg-brown">
                <a href="index.php?action=messenger" class="text-grey d-lg-none mb-3" title="Retour">
                    <img alt="" src="<?= BASE_URL ?>/assets/back-arrow.svg" /> retour
                </a>

                <div class="d-flex align-items-center mb-3">
                    <a class="text-black" href="index.php?action=member&id=<?= htmlspecialchars($member->getId()) ?>">
                        <?php $memberPic = $member->getProfilePicture() ?: './assets/profil/profil.webp'; ?>
                        <img width='48' height='48' src="<?= htmlspecialchars($memberPic) ?>" alt="Photo de profil" class="profile-pic rounded-pill">
                        <div class="ms-2 d-inline-block fs-5"><?= htmlspecialchars($member->getPseudo()) ?></div>
                    </a>
                </div>

                <div id="discussion-holder" class="discussion flex-grow-1">
                    <div id="messagesContainer" class="d-flex flex-column justify-content-end me-3">
                        <?php foreach ($messages as $message) : ?>
                            <?php $isSent = $message->getSenderId() === $user->getId(); ?>
                            <div class="<?= $isSent ? 'sended' : 'recived' ?> col-11 col-lg-9 align-self-<?= $isSent ? 'end' : 'start' ?> my-2">
                                <div class="text-sm text-grey d-flex align-items-center mb-2 <?= $isSent ? 'me-2 justify-content-end' : 'ms-2' ?>">
                                    <?php if (!$isSent) : ?>
                                        <img width='24' height='24' src="<?= htmlspecialchars($memberPic) ?>" alt="Photo de profil" class="profile-pic rounded-pill me-2">
                                    <?php endif; ?>
                                    <?= htmlspecialchars($message->getSendedAt()->format('d.m H:i')) ?>
                                </div>
                                <p class="p-3 rounded <?= $isSent ? 'bg-light-blue' : 'bg-white' ?>">
                                    <?= htmlspecialchars($message->getContent()) ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <form id="messageForm" class="d-flex mt-3 flex-column flex-lg-row">
                    <input type="text" name="content" id="content" placeholder="Tapez votre message ici" class="flex-grow-1 form-control mb-3 mb-lg-0" required>
                    <button type="submit" class="main-button border-0 py-2 ms-lg-3">Envoyer</button>
                </form>
            </section>
        <?php } ?>
    </main>
</div>

<script src="./js/messager.js"></script>