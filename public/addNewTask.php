<?php

use Peshkariki\Controllers\TaskController;
use Peshkariki\ErrorHelper;
use Peshkariki\FileSystem;

$root = dirname(__FILE__, 2);
$public = __DIR__;
//автозагрузчик и объект PDO
require_once ($root . '/bootstrap.php');
//обработчик ошибок
$errorHelper = new ErrorHelper(FileSystem::append([$root, 'templates']));
try {
    $controller = new TaskController($root, $public, $pdo);
    $controller->start();
} catch (\Throwable $e) {
    $errorHelper->dispatch($e);
}