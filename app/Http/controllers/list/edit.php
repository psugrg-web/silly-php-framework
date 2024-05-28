<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

// Check if you're allowed
$product = $db->query('select * from products where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($product['user_id'] === Session::get('user')['id']);

view('/list/edit.view.php', [
    'errors' => [],
    'product' => $product
]);
