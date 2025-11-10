<?php

class ConnectionController
{
    public function signIn()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if ($email === '' || $password === '') {
                header('Location: index.php?action=login&error=' . urlencode('Tous les champs sont obligatoires'));
                exit;
            }

            $userManager = new UserManager();
            $user = $userManager->findByEmail($email);

            if (!$user) {
                header('Location: index.php?action=login&error=' . urlencode('Adresse email et/ou mot de passe incorrect'));
                exit;
            }

            if (password_verify($password, $user->getPassword())) {
                session_start();
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'pseudo' => $user->getPseudo(),
                    'email' => $user->getEmail()
                ];
                header('Location: index.php?action=home');
                exit;
            } else {
                header('Location: index.php?action=login&error=' . urlencode('Adresse email et/ou mot de passe incorrect'));
                exit;
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?action=home');
        exit;
    }
}
