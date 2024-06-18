<?php

use Core\Container;
use Core\Database;
use Core\App;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(base_path('.'));
$dotenv->load();

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config['database'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD']);
});

App::setContainer($container);
