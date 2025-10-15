<?php

class View
{
    private string $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $viewPath 
     * @param array $params
     * @return string
     */
    public function render(string $viewName, array $params = []): void
    {
        $viewPath = $this->buildViewPath($viewName);

        $content = $this->_renderViewFromTemplate($viewPath, $params);
        $title = $this->title;
        ob_start();
        require(MAIN_VIEW_PATH);
        echo ob_get_clean();
    }

    /**
     * @param $viewPath
     * @param array $params
     * @throws Exception
     * @return string
     */
    private function _renderViewFromTemplate(string $viewPath, array $params = []): string
    {
        if (file_exists($viewPath)) {
            extract($params);
            ob_start();
            require($viewPath);
            return ob_get_clean();
        } else {
            throw new Exception("La vue '$viewPath' est introuvable.");
        }
    }

    /**
     * @param string $viewName
     * @return string
     */
    private function buildViewPath(string $viewName): string
    {
        return TEMPLATE_VIEW_PATH . $viewName . '.php';
    }
}
