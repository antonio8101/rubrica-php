<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\View;

class ContactForm implements ActionContract{

    public function respond(): string{

        $view = new View();

        return $view->render("form.html.twig", [
            "test" => "IT WORKS!!!"
        ]);

    }

}