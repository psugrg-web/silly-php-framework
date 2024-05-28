<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$query = "SELECT * FROM products WHERE user_id = :user_id";
$products = $db->query(
    $query,
    [':user_id' => Session::get('user')['id']]
)->get();

view('/list/index.view.php', [
    'products' => $products
]);
