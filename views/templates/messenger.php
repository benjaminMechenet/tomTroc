<main class="p-4 gap-5 bg-light">

    <div class="w-75 m-auto p-4 m-4">

        <table class="table align-middle">
            <tbody class="library-table">
                <?php foreach ($discussions as $discussion) { ?>
                    <tr class="pointer" data-href="index.php?action=chat&id=<?= htmlspecialchars($discussion->getId()) ?>">
                        <td class="w-15 px-3 py-2 text-center">
                            <?= htmlspecialchars($discussion->getOtherUser()->getPseudo()) ?>
                            <?= htmlspecialchars($discussion->getMessage()->getContent()) ?>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>