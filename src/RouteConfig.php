<?php

namespace Abruno\Rubrica;

/**
 * Rappresenta una configurazione per una specifica Route.
 *
 * Questa classe viene utilizzata per definire una Route specificando il suo pattern
 * e il delegato ad essa associato.
 */
class RouteConfig{

    public string $pattern;
    public mixed $delegate;

    public function __construct(string $pattern, callable $delegate){
        $this->pattern = $pattern;
        $this->delegate = $delegate;
    }

}