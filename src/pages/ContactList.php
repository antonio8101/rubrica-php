<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\Response;
use Abruno\Rubrica\ViewResponse;
use Abruno\Rubrica\entity\Contact;

class ContactList implements ActionContract{

    public function respond(): Response{

        $c1 = new Contact();
        $c1->name = "Antonio";
        $c1->surname = "Bruno";
        $c1->email = "test@test.it";

        $c2 = new Contact();
        $c2->name = "Paolo";
        $c2->surname = "Test1";

        $c3 = new Contact();
        $c3->name = "Giuseppe";
        $c3->surname = "Test2";

        $view = new ViewResponse("list.html.twig", [
            "title" => "Contact List",
            "contatti" => [$c1, $c2, $c3]
        ]);

        return $view;
    }

}