<?php

use Peshkariki\Controllers\EditController;
use Peshkariki\ErrorHelper;
use Peshkariki\FileSystem;

$root = dirname(__FILE__, 2);
//автозагрузчик и объект PDO
require_once ($root . '/bootstrap.php');
//обработчик ошибок
$errorHelper = new ErrorHelper(FileSystem::append([$root, 'templates']));
try {
    $controller = new EditController($root, $pdo);
    $controller->start();
    
} catch (\Throwable $e) {
    $errorHelper->dispatch($e);
}