<?php

class BookController
{
    public function delete($id)
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $bookManager = new BookManager();
        if ($book = $bookManager->findByIdAndUser($id, $_SESSION['user']['id'])) {
            $oldImagePath = $book->getImageUrl();

            if (
                $oldImagePath &&
                $oldImagePath !== 'assets/books/default.webp' &&
                file_exists(__DIR__ . '/../' . $oldImagePath)
            ) {
                unlink(__DIR__ . '/../' . $oldImagePath);
            }

            $bookManager->delete($id);
            header('Location: index.php?action=account');
            exit;
        } else {
            header('Location: index.php?action=login');
        }
    }

    public function update($id)
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $bookManager = new BookManager();
        if ($book = $bookManager->findByIdAndUser($id, $_SESSION['user']['id'])) {


            if ($_FILES && $_FILES['cover_picture']['size'] > 5_000_000) {
                die('Fichier trop volumineux.');
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = trim($_POST['title'] ?? '');
                $author = trim($_POST['author'] ?? '');
                $description = trim($_POST['description'] ?? '');
                $available = $_POST['available'] ?? 1;
                $relativePath = $book->getImageUrl();
                $oldImagePath = $book->getImageUrl();

                if (isset($_FILES['cover_picture']) && $_FILES['cover_picture']['error'] === UPLOAD_ERR_OK) {

                    if (
                        $oldImagePath &&
                        $oldImagePath !== 'assets/books/default.webp' &&
                        file_exists(__DIR__ . '/../' . $oldImagePath)
                    ) {
                        unlink(__DIR__ . '/../' . $oldImagePath);
                    }

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
                }

                $bookManager->update($title, $author, $description, $available, $id, $relativePath);
                header('Location: index.php?action=book&id=' . $id);
                exit;
            }
        }
    }

    public function addBook()
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $bookManager = new BookManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title  = trim($_POST['title'] ?? '');
            $author = trim($_POST['author'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $userId = $_SESSION['user']['id'];

            if ($_FILES['cover_picture']['size'] > 5_000_000) {
                die('Fichier trop volumineux.');
            }

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
            } else {
                $relativePath = 'assets/books/default.webp';
            }


            $bookManager->create($title, $author, $description, $userId, $relativePath);
            header('Location: index.php?action=account');
            exit;
        } else {
            header('Location: index.php?action=account');
            exit;
        }
    }

    public function updateAvailability()
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?action=404');
            exit;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['id']) || !isset($data['available'])) {
            echo json_encode(['success' => false]);
            header('Location: index.php?action=404');
            exit;
        }

        $id = $data['id'];
        $state = $data['available'];

        $bookManager = new BookManager();
        $bookManager->updateAvailability($id, $state);
        exit;
    }
}
