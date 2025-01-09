<?php


namespace Abruno\Rubrica;

use Abruno\Rubrica\pages\ActionContract;
use ReflectionClass;

/**
 * Rappresenta una configurazione per una specifica Route.
 *
 * Questa classe viene utilizzata per definire una Route specificando il suo pattern
 * e il delegato ad essa associato.
 */
class RouteConfig{

    public string $pattern;
    public mixed $delegate;

    public function __construct(string $pattern, callable | string $delegate){
        $this->pattern = $pattern;

        if(is_string($delegate) && ! $this->is_valid($delegate))
            throw new \Exception("invalid class $delegate"); 

        $this->delegate = $delegate;
    }

    /**
     * Verifica che la stringa passata sia effettivamente il nome di una classe
     * classe che implementa l'interfaccia ActionContract::class
     * 
     * @param string $delegate
     * @return bool
     */
    private function is_valid(string $delegate):bool {
        if (class_exists($delegate)){
            $reflection = new ReflectionClass($delegate);
            return $reflection->implementsInterface(ActionContract::class);
        }
        
        return false;
    }

}