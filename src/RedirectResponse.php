<?php

namespace Abruno\Rubrica;

class RedirectResponse extends Response {

    private string $target;

    public function __construct(string $target){
        $this->target = $target;
    }

    public function send(){
        header("Location: $this->target");
    }

}