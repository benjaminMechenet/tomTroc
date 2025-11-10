<?php

class BookController
{
    public function delete($id)
    {
        $bookManager = new BookManager();
        $bookManager->delete($id);
        header('Location: index.php?action=account');
        exit;
    }

    public function update() {}

    public function updateAvailability()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['id']) || !isset($data['available'])) {
            echo json_encode(['success' => false]);
            exit;
        }

        $id = $data['id'];
        $state = $data['available'];

        $bookManager = new BookManager();
        $bookManager->updataAvailability($id, $state);
        exit;
    }
}
