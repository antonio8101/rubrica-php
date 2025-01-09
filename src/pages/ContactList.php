<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\repository\RepositoryContract;
use Abruno\Rubrica\Response;
use Abruno\Rubrica\ViewResponse;
use Abruno\Rubrica\Request;
use Abruno\Rubrica\App;

class ContactList implements ActionContract{

    public function respond(Request $request): Response{

        $repository =  App::getService(RepositoryContract::class);

        $contacts = $repository->all();

        $view = new ViewResponse("list.html.twig", [
            "title" => "Contact List",
            "contatti" => $contacts
        ]);

        return $view;
    }

}