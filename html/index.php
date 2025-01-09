<?php 

require_once "../vendor/autoload.php";

// Using relativi alle classi utilizzate in questo file

use Abruno\Rubrica\pages\ContactForm;
use Abruno\Rubrica\pages\ContactList;
use Abruno\Rubrica\pages\DeleteItem;
use Abruno\Rubrica\pages\ProcessForm;
use Abruno\Rubrica\repository\json\ContactRepository;
use Abruno\Rubrica\repository\RepositoryContract;
use Abruno\Rubrica\Request;
use Abruno\Rubrica\Route; // Riferimento alla classe Route
use Abruno\Rubrica\App;

// Impostazione delle Route (tramite metodi statici Get/Post)
Route::Get( "/", ContactList::class );
Route::Get( "/list", ContactList::class );
Route::Get( "/new", ContactForm::class );
Route::Get( "/delete", DeleteItem::class );
Route::Post( "/", ProcessForm::class );

$request = Request::Capture();


App::registerService(RepositoryContract::class, new ContactRepository());

// PRIMO UTILIZZO DEL REPOSITORY
$repository = App::getService(RepositoryContract::class);
$repository->createContainer();

// Invochiamo la risoluzione della Route
$routeConfig = Route::Resolve($request); // Risolvi la URI

if (is_callable($routeConfig->delegate)){
    $delegate    = $routeConfig->delegate; // Instanzia il delegato in una variabile
    $value       = $delegate($request); // Invoca il delegato corrispondente (uno di quelli definiti sopra)
    echo $value;
} else {
    $delegate = new $routeConfig->delegate();
    $value = $delegate->respond($request);
    $value->send();
}