<?php

class PageController
{
    /**
     * @return void
     */
    public function showHome(): void
    {
        $bookManager = new BookManager();
        $userManager = new UserManager();
        $books = $bookManager->getLatestBooks();
        foreach ($books as $book) {
            $user = $userManager->getUserById($book->getUserId());
            $book->setUserPseudo($user->getPseudo());
        }

        $view = new View("Accueil");
        $view->render("home", ['books' => $books]);
    }

    /**
     * @return void
     */
    public function showBooks(): void
    {
        $bookManager = new BookManager();
        $userManager = new UserManager();
        $books = $bookManager->getAllBooks();

        foreach ($books as $book) {
            $user = $userManager->getUserById($book->getUserId());
            $book->setUserPseudo($user->getPseudo());
        }

        $view = new View("Books");
        $view->render("books", ['books' => $books]);
    }

    /**
     * @return void
     */
    public function showBook($id): void
    {
        $bookManager = new BookManager();
        $book = $bookManager->findById($id);

        if (!$book) {
            header('Location: index.php?action=404');
            return;
        }

        $userManager = new UserManager();
        $user = $userManager->findById($book->getUserId());

        $view = new View("Book");
        $view->render("book", ["book" => $book, 'user' => $user]);
    }

    /**
     * @return void
     */
    public function showBookEdit($id): void
    {
        $bookManager = new BookManager();
        $book = $bookManager->findById($id);

        if (!$book) {
            header('Location: index.php?action=404');
            return;
        }

        $userManager = new UserManager();
        $user = $userManager->findById($book->getUserId());

        $view = new View("BookEdit");
        $view->render("bookEdit", ["book" => $book, 'user' => $user]);
    }

    /**
     * @return void
     */
    public function createBook(): void
    {
        $view = new View("BookCreate");
        $view->render("bookCreate");
    }

    /**
     * @return void
     */
    public function showAccount(): void
    {
        if ($_SESSION['user']) {
            $userManager = new UserManager();
            $user = $userManager->findById($_SESSION['user']['id']);

            $bookManager = new BookManager();
            $books = $bookManager->findByUser($user);

            $view = new View("Account");
            $view->render("account", ['user' => $user, 'books' => $books]);
        } else {
            header('Location: index.php');
        }
    }


    /**
     * @return void
     */
    public function showMember($id): void
    {
        $userManager = new UserManager();
        $user = $userManager->findById($id);

        if (!$user) {
            header('Location: index.php?action=404');
            return;
        }

        $bookManager = new BookManager();
        $books = $bookManager->findByUser($user);

        $view = new View("Member");
        $view->render("member", ['user' => $user, 'books' => $books]);
    }

    /**
     * @return void
     */
    public function showSignUp(): void
    {
        $view = new View("SignUp");
        $view->render("signup");
    }

    /**
     * @return void
     */
    public function showLogin(): void
    {
        $view = new View("Login");
        $view->render("login");
    }


    /**
     * @return void
     */
    public function showMessenger($id): void
    {
        if ($_SESSION) {
            $userManager = new UserManager();
            $user = $userManager->findById($_SESSION['user']['id']);

            $member = '';
            $messages = [];

            if ($id) {
                $member = $userManager->findById($id);
                $messagesManager = new MessagesManager();
                $messages = $messagesManager->findByUsers($_SESSION['user']['id'], $id);
            }

            $discussionsManager = new DiscussionManager();
            $discussions = $discussionsManager->findByUser($user);

            $view = new View("Messenger");
            $view->render("messenger", ['user' => $user, 'discussions' => $discussions, 'member' => $member, 'messages' => $messages]);
        } else {
            $view = new View("Login");
            $view->render("login");
        }
    }


    /**
     * @return void
     */
    public function show404(): void
    {
        $view = new View("Error");
        $view->render("error");
    }
}
