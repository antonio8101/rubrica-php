<?php 

require_once "../vendor/autoload.php";

// Using relativi alle classi utilizzate in questo file
use Abruno\Rubrica\Route; // Riferimento alla classe Route

// Impostazione delle Route (tramite metodi statici Get/Post)
Route::Get( "/", fn() => "List" );
Route::Get( "/list", fn() => "List" );
Route::Get( "/new", fn() => "New" );
Route::Post( "/", fn() => "POST-List" );

// Invochiamo la risoluzione della Route
$routeConfig = Route::Resolve(); // Risolvi la URI
$delegate    = $routeConfig->delegate; // Instanzia il delegato in una variabile
$value       = $delegate(); // Invoca il delegato corrispondente (uno di quelli definiti sopra)

// Più sotto $value, che è una stringa è utilizzato nel template html
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!--utilizzo di $value-->
    <h1><?=$value?></h1>


    <!--un form che ci serve ad invocare la route / con il metodo POST-->
    <form action="/" method="post">
        <input type="text" name="prova" id="prova">
        <button type="submit">submit</button>
    </form>
</body>
</html>