<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\View;

use Abruno\Rubrica\Response;
use Abruno\Rubrica\ViewResponse;

class ContactList implements ActionContract{

    public function respond(): Response{

        $view = new ViewResponse("list.html.twig", [
            "contacts" => ["Antonio", "Paolo", "Giuseppe"]
        ]);

        return $view;
    }

}