<?php

namespace Abruno\Rubrica\pages;

class ProcessForm implements ActionContract{

    public function respond(): string{

        var_dump($_POST);

        return "ProcessForm from class";
    }

}