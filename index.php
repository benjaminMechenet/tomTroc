<?php
require_once __DIR__ . '/config/autoload.php';
require_once 'config/config.php';

$action = Utils::request('action', 'home');

try {
    switch ($action) {
        case 'home':
            $controller = new PageController();
            $controller->showHome();
            break;

        case 'books':
            $controller = new PageController();
            $controller->showBooks();
            break;

        case 'signup':
            $controller = new PageController();
            $controller->showSignUp();
            break;

        case 'register':
            $controller = new SignUpController();
            $controller->register();
            break;

        case 'update-account':
            $controller = new SignUpController();
            $controller->update();
            break;

        case 'login':
            $controller = new PageController();
            $controller->showLogin();
            break;

        case 'signin':
            $controller = new ConnectionController();
            $controller->signIn();
            break;

        case 'logout':
            $controller = new ConnectionController();
            $controller->logout();
            break;

        case 'book':
            $controller = new PageController();
            $id = $_GET['id'] ?? null;
            $controller->showBook($id);
            break;

        case 'delete-book':
            $controller = new BookController();
            $id = $_GET['id'] ?? null;
            $controller->delete($id);
            break;

        case 'account':
            $controller = new PageController();
            $controller->showAccount();
            break;

        case 'update-picture':
            $controller = new SignUpController();
            $controller->updateProfilePicture();
            break;

        case 'member':
            $controller = new PageController();
            $id = $_GET['id'] ?? null;
            $controller->showMember($id);
            break;

        case 'updateLabel':
            $controller = new BookController();
            $controller->updateAvailability();
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
