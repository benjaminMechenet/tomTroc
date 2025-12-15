<?php

class MesssageController
{
    /**
     * @return void
     */
    public function sendMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_SESSION['user']['id'])) {
                header('Location: index.php?action=login');
                exit;
            }

            if ($_POST) {
                $id1 = $_SESSION['user']['id'];
                $id2 = (int)$_POST["id"];

                $messageManager = new MessagesManager();
                $discussionsManager = new DiscussionManager();
                $discussion = $discussionsManager->findByUsers($id1, $id2);

                if (!$discussion) {
                    $discussionId = $discussionsManager->create($id1, $id2);
                } else {
                    $discussionId = $discussion->getId();
                }

                $senderId  = $id1;
                $content = trim($_POST['content'] ?? '');

                $lastMessage = $messageManager->create($discussionId, $senderId, $content);
                $discussionsManager->updateLast($discussionId, $lastMessage);

                return $_POST['content'];
            }
        }
    }
}
