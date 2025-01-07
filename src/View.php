<?php

namespace Abruno\Rubrica;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View{

    public function render(string $view, array $data):string {

        $loader = new FilesystemLoader(__DIR__ . "/templates");

        $twig = new Environment($loader, [
            'auto_reload' => true,
            'debug' => true
        ]);

        return $twig->render($view, $data);
    }

}