<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\View;

class ContactList implements ActionContract{

    public function respond(): string{

        $view = new View();

        return $view->render("list.html.twig", [
            "contacts" => ["Antonio", "Paolo", "Giuseppe"]
        ]);

    }

}