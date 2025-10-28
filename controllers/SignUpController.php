<?php

class SignUpController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = trim($_POST['pseudo'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if ($pseudo === '' || $email === '' || $password === '') {
                header('Location: index.php?action=signup&error=Tous les champs sont obligatoires');
                exit;
            }

            $userManager = new UserManager();

            if ($userManager->findByEmail($email)) {
                header('Location: index.php?action=signup&error=Email déjà utilisé');
                exit;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $userManager->create($pseudo, $email, $hashedPassword);

            header('Location: index.php?action=login');
            exit;
        }
    }
}
