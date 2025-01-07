<?php 

require_once "../vendor/autoload.php";

// Using relativi alle classi utilizzate in questo file

use Abruno\Rubrica\pages\ContactForm;
use Abruno\Rubrica\pages\ContactList;
use Abruno\Rubrica\pages\ProcessForm;
use Abruno\Rubrica\Route; // Riferimento alla classe Route

// Impostazione delle Route (tramite metodi statici Get/Post)
Route::Get( "/", ContactList::class );
Route::Get( "/list", fn() => "List" );
Route::Get( "/new", ContactForm::class );
Route::Post( "/", ProcessForm::class );

// Invochiamo la risoluzione della Route
$routeConfig = Route::Resolve(); // Risolvi la URI

if (is_callable($routeConfig->delegate)){
    $delegate    = $routeConfig->delegate; // Instanzia il delegato in una variabile
    $value       = $delegate(); // Invoca il delegato corrispondente (uno di quelli definiti sopra)
    echo $value;
} else {
    $delegate = new $routeConfig->delegate();
    $value = $delegate->respond();
    $value->send();
}