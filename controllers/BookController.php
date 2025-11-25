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

    public function update($id)
    {
        $bookManager = new BookManager();
        if ($bookManager->findByIdAndUser($id, $_SESSION['user']['id'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = trim($_POST['title'] ?? '');
                $author = trim($_POST['author'] ?? '');
                $description = trim($_POST['description'] ?? '');
                $available = $_POST['available'] ?? 1;

                $bookManager->update($title, $author, $description, $available, $id);
                header('Location: index.php?action=book&id=' . $id);
                exit;
            }
        }
    }

    public function updateCoverPicture($id)
    {
        $bookManager = new BookManager();
        if ($bookManager->findByIdAndUser($id, $_SESSION['user']['id'])) {
            if (isset($_FILES['cover_picture']) && $_FILES['cover_picture']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../assets/books/';

                $tmpName = $_FILES['cover_picture']['tmp_name'];
                $fileInfo = pathinfo($_FILES['cover_picture']['name']);
                $extension = strtolower($fileInfo['extension']);

                $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                if (!in_array($extension, $allowed)) {
                    die('Format non supporté.');
                }

                $newFileName = uniqid('book_', true) . '.' . $extension;
                $destination = $uploadDir . $newFileName;

                if (!move_uploaded_file($tmpName, $destination)) {
                    die('Erreur lors de l\'upload.');
                }

                $newFileName = Utils::resizeImageToWebp($destination, 1000);

                $relativePath = 'assets/books/' . $newFileName;
                $bookManager->updateImage($relativePath, $id);
                header('Location: index.php?action=bookEdit&id=' . $id);
                exit;
            }
        }
    }

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
