<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\RedirectResponse;
use Abruno\Rubrica\Response;

class ProcessForm implements ActionContract{

    public function respond(): Response{

        // SALVARE NEI DATI IL NUOVO CONTATTO...
        
        // E RITORNARE ALLA LISTA

        return new RedirectResponse("/");
    }

}