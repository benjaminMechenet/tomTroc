<?php

class PageController
{
    /**
     * @return void
     */
    public function showHome(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getLatestBooks();

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

        $view = new View("Book");
        $view->render("book", ["book" => $book]);
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
}
