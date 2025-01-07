<?php

namespace Abruno\Rubrica\pages;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ContactForm implements ActionContract{

    public function respond(): string{

        $loader = new FilesystemLoader("/var/www/src/templates");

        $twig = new Environment($loader, [
            'auto_reload' => true,
            'debug' => true
        ]);

        return $twig->render("form.html.twig", [
            "test" => "IT WORKS!!!"
        ]);

    }

}