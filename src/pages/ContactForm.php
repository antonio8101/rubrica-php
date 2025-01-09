<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\Response;
use Abruno\Rubrica\ViewResponse;

class ContactForm implements ActionContract{

    public function respond(): Response{

        //

        return new ViewResponse("form.html.twig", [
            "test" => "IT WORKS!!!"
        ]);
    }

}