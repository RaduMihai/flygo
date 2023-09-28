<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

set_exception_handler("ErrorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");
$parts = explode("/", $_SERVER["REQUEST_URI"]);
if ($parts[2] != "words") {
    echo 'Not found';
    http_response_code(404);
    exit;
}

// the array index depends on project URL
$date = $parts[2] ?? null;

$wordProvider = new WordProvider();

$controller = new WordController($wordProvider);
$controller->processRequest($_SERVER["REQUEST_METHOD"], $date);












