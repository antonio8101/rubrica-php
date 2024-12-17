<?php

namespace Abruno\Rubrica;

class RouteConfig{

    public string $pattern;
    public mixed $delegate;

    public function __construct(string $pattern, callable $delegate){
        $this->pattern = $pattern;
        $this->delegate = $delegate;
    }

}