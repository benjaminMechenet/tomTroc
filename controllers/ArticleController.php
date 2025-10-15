<?php

class ArticleController
{
    /**
     * @return void
     */
    public function showHome(): void
    {
        $view = new View("Accueil");
        $view->render("home");
    }
}
