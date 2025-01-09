<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\Request;
use Abruno\Rubrica\Response;
use Abruno\Rubrica\ViewResponse;

class ContactForm implements ActionContract{

    public function respond(Request $request): Response{

       

        return new ViewResponse("form.html.twig", [
            "test" => "IT WORKS!!!"
        ]);
    }

}