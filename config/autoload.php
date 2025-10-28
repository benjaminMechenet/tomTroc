<?php
spl_autoload_register(function ($className) {

    $folders = ['services', 'models', 'controllers', 'views'];

    foreach ($folders as $folder) {
        $path = $folder . '/' . $className . '.php';

        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});
