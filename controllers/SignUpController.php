<?php

class SignUpController
{
    public function register()
    {
        if (isset($_SESSION['user']['id'])) {
            header('Location: index.php?action=account');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = trim($_POST['pseudo'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if ($pseudo === '' || $email === '' || $password === '') {
                header('Location: index.php?action=signup&error=' . urlencode('Tous les champs sont obligatoires'));
                exit;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: index.php?action=signup&error=' . urlencode('Adresse email invalide'));
                exit;
            }

            $userManager = new UserManager();

            if ($userManager->findByEmail($email)) {
                header('Location: index.php?action=signup&error=' . urlencode('Email déjà utilisé'));
                exit;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $userManager->create($pseudo, $email, $hashedPassword);

            header('Location: index.php?action=login');
            exit;
        } else {
            header('Location: index.php?action=login');
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user']['id'])) {
                header('Location: index.php?action=login');
                exit;
            }

            $pseudo = trim($_POST['pseudo'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $userManager = new UserManager();
            $currentUser = $userManager->findById($_SESSION['user']['id']);

            if (!$currentUser) {
                header('Location: index.php?action=login');
                exit;
            }

            if ($password !== "") {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $hashedPassword = $currentUser->getPassword();
            }

            $userManager->update($pseudo, $email, $hashedPassword, $_SESSION['user']['id']);
            $_SESSION['user']['pseudo'] = $pseudo;
            $_SESSION['user']['email'] = $email;

            header('Location: index.php?action=account');
            exit;
        } else {
            header('Location: index.php?action=404');
        }
    }

    public function updateProfilePicture()
    {
        if (
            !isset($_SESSION['user']['id']) ||
            !isset($_FILES['profile_picture']) ||
            $_FILES['profile_picture']['error'] !== UPLOAD_ERR_OK
        ) {
            header('Location: index.php?action=login');
            return;
        }

        $uploadDir = __DIR__ . '/../assets/profil/';

        $tmpName = $_FILES['profile_picture']['tmp_name'];
        $fileInfo = pathinfo($_FILES['profile_picture']['name']);
        $extension = strtolower($fileInfo['extension']);

        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($extension, $allowed)) {
            die('Format non supporté.');
        }

        $newFileName = uniqid('profil_', true) . '.' . $extension;
        $destination = $uploadDir . $newFileName;

        if (!move_uploaded_file($tmpName, $destination)) {
            die('Erreur lors de l\'upload.');
        }

        $newFileName = Utils::resizeImageToWebp($destination, 150);
        $relativePath = 'assets/profil/' . $newFileName;

        $userManager = new UserManager();
        $user = $userManager->findById($_SESSION['user']['id']);

        if ($user) {
            $oldImagePath = $user->getProfilePicture();

            if (
                $oldImagePath &&
                $oldImagePath !== 'assets/profil/profil.webp' &&
                file_exists(__DIR__ . '/../' . $oldImagePath)
            ) {
                unlink(__DIR__ . '/../' . $oldImagePath);
            }

            $userManager->updateImage($relativePath, $_SESSION['user']['id']);
            header('Location: index.php?action=account');
            exit;
        }
    }
}
