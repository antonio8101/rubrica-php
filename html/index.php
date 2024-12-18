<?php 

require_once "../vendor/autoload.php";

use Abruno\Rubrica\Route;

Route::Get("/", function(){ return "List";});
Route::Get("/list", function(){return "List";});
Route::Get("/new", function(){return "New";});
Route::Post("/", function(){ return "POST-List";});

$routeConfig = Route::Resolve();
$delegate = $routeConfig->delegate;
$value = $delegate();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1><?=$value?></h1>

    <form action="/" method="post">
        <input type="text" name="prova" id="prova">
        <button type="submit">submit</button>
    </form>
</body>
</html>